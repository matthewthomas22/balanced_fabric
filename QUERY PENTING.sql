DECLARE 
    r1 prominent.v_fabric_issued%rowtype;
    r2 prominent.temp_penerimaan%rowtype;
    qty_garment integer;
    hasil_garment integer;    
    vcons numeric(12,2);
    vneed numeric(12,2);    
BEGIN
    IF (vno_urut = 0) THEN
        UPDATE prominent.t_zroh 
        SET prn = NULL;        
    END IF;

    DELETE FROM prominent.temp_pemakaian;
    DELETE FROM prominent.temp_penerimaan;

    INSERT INTO prominent.temp_penerimaan
    SELECT 
        zroh,
        -- format pemakaian sebelumnya yang dipakai pa eka 
        -- '#INV: ' || COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ETD: ' || etd || ' PRICE: ' || COALESCE(fab_price, 0) AS keyy,

        -- CASE 
        --     WHEN fab_received IS NULL THEN COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY') || ', ETA '|| TO_CHAR(eta, 'FMMM/FMDD/YY')
        --     ELSE COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY') || ', ETA ' || TO_CHAR(eta, 'FMMM/FMDD/YY') || ' in '|| TO_CHAR(fab_received, 'FMMM/FMDD/YY')
        -- END AS keyy,

        COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY') || ', ETA '|| TO_CHAR(eta, 'FMMM/FMDD/YY')  as keyy,
        COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY')   as keyy,
        --PANDA2404010 (8.25) - ETD 4/16/24, ETA 4/18/24, in 4/22/24 & PANDA2404011 (8.25) - ETD 4/16/24, ETA 4/18/24, in 4/22/24 & PANDA2404007 (8.25) - ETD 4/16/24, ETA 4/22/24, in 4/24/24

        CASE 
            WHEN fab_received IS NULL THEN etd 
            ELSE fab_received 
        END AS fab_received,
        fab_price, 
        SUM(
            CASE 
                WHEN COALESCE(fab_qty_received, 0) = 0 THEN COALESCE(fab_qty_inv, 0) 
                ELSE COALESCE(fab_qty_received, 0) 
            END + COALESCE(auto_test_val, 0)
        ) AS qty_in,
        0 AS qty_use
    FROM 
        prominent.v_fabric_received
    WHERE 
        zroh = vzroh
    GROUP BY 
        zroh,
        -- format pemakaian sebelumnya yang dipakai pa eka 
        -- '#INV: ' || COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ETD: ' || etd || ' PRICE: ' || COALESCE(fab_price, 0),
        -- CASE 
        --     WHEN fab_received IS NULL THEN COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY') || ', ETA '|| TO_CHAR(eta, 'FMMM/FMDD/YY')
        --     ELSE COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY') || ', ETA ' || TO_CHAR(eta, 'FMMM/FMDD/YY') || ' in '|| TO_CHAR(fab_received, 'FMMM/FMDD/YY')
        -- END,
        -- COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY') || ', ETA '|| TO_CHAR(eta, 'FMMM/FMDD/YY') ,
        COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY'),
        CASE 
            WHEN fab_received IS NULL THEN etd 
            ELSE fab_received 
        END,
        fab_price
    ORDER BY 
        zroh,
        fab_received,
        fab_price,
         -- '#INV: ' || COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ETD: ' || etd || ' PRICE: ' || COALESCE(fab_price, 0),
        -- CASE 
        --     WHEN fab_received IS NULL THEN COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY') || ', ETA '|| TO_CHAR(eta, 'FMMM/FMDD/YY')
        --     ELSE COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY') || ', ETA ' || TO_CHAR(eta, 'FMMM/FMDD/YY') || ' in '|| TO_CHAR(fab_received, 'FMMM/FMDD/YY')
        -- END
        -- COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY') || ', ETA '|| TO_CHAR(eta, 'FMMM/FMDD/YY') ;
        COALESCE(fab_inv_no, 'EX-MILL ' || fab_inv_po) || ' ('|| COALESCE(fab_price, 0) || ') - ETD ' || TO_CHAR(etd, 'FMMM/FMDD/YY');

    FOR r1 IN (
        SELECT * 
        FROM prominent.v_fabric_issued 
        WHERE zroh = vzroh 
        ORDER BY zroh, original_ex_date, received_date_sort, po_buyer, urutan_item, date_ship, id_detail
    )
    LOOP
        qty_garment = r1.qty_cut;
        vcons = r1.consumption;
        vneed = r1.qty_cut * r1.consumption;

        FOR r2 IN (
            SELECT * 
            FROM (
                SELECT 
                    a.zroh, 
                    a.keyy, 
                    a.fab_received, 
                    a.fab_price, 
                    a.qty_in, 
                    COALESCE(b.qty_use, 0) AS qty_use, 
                    a.qty_in - COALESCE(b.qty_use, 0) AS sisa
                FROM 
                    prominent.temp_penerimaan a
                LEFT JOIN (
                    SELECT 
                        keyy, 
                        SUM(qty_use) AS qty_use 
                    FROM 
                        prominent.temp_pemakaian 
                    GROUP BY keyy
                ) b ON a.keyy = b.keyy
                ORDER BY a.zroh, a.fab_received, a.fab_price, a.keyy
            ) 
            WHERE sisa >= vcons
            ORDER BY zroh, fab_received, fab_price, keyy
        )
        LOOP    
            hasil_garment = 0;
            
            IF ((r2.qty_in - r2.qty_use) >= vneed) THEN
                INSERT INTO prominent.temp_pemakaian 
                VALUES (r1.id_detail, r2.keyy, vneed, vcons, qty_garment);
                EXIT;

            ELSE 
                hasil_garment = TRUNC((r2.qty_in - r2.qty_use) / vcons);
                INSERT INTO prominent.temp_pemakaian 
                VALUES (r1.id_detail, r2.keyy, (hasil_garment * vcons), vcons, hasil_garment);
                vneed = vneed - (hasil_garment * vcons);
                qty_garment = qty_garment - hasil_garment;                
            END IF;
        END LOOP;
    END LOOP;

    UPDATE prominent.t_zroh 
    SET prn = 'Y' 
    WHERE zroh = vzroh;

    SELECT INTO pesan 'ok';
END;
