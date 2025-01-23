
DECLARE 
	r1 prominent.v_fabric_issued%rowtype;
	r2 prominent.temp_penerimaan%rowtype;
	qty_garment integer;
	hasil_garment integer;	
	vcons numeric(12,2);
	vneed numeric(12,2);	
BEGIN
	if(vno_urut = 0) then
	   update prominent.t_zroh set prn = null;		
	end if;

	delete from prominent.temp_pemakaian ;
	delete from prominent.temp_penerimaan ;

	insert into prominent.temp_penerimaan
	--select zroh,'#INV: '||fab_inv_no||' ETD: '||etd || ' PRICE: ' ||fab_price as keyy,fab_received,fab_price, sum(coalesce(fab_qty_received,0) + coalesce(auto_test_val,0))as qty_in,0 as qty_use
	--from prominent.v_fabric_received
	--where zroh = vzroh
	--group by zroh,'#INV: '||fab_inv_no||' ETD: '||etd || ' PRICE: ' ||fab_price,fab_received,fab_price
	--order by zroh,fab_received,fab_price,'#INV: '||fab_inv_no||' ETD: '||etd || ' PRICE: ' ||fab_price;

	select zroh,'#INV: '||coalesce(fab_inv_no,'EX-MILL '||fab_inv_po)||' ETD: '||etd || ' PRICE: ' ||COALESCE(fab_price,0) as keyy,case when fab_received isnull then etd else fab_received end as fab_received,fab_price, sum((case when coalesce(fab_qty_received,0) = 0 then coalesce(fab_qty_inv,0) else coalesce(fab_qty_received,0) end) + coalesce(auto_test_val,0))as qty_in,0 as qty_use
	from prominent.v_fabric_received
	where zroh = '108526'
	group by zroh,'#INV: '||coalesce(fab_inv_no,'EX-MILL '||fab_inv_po)||' ETD: '||etd || ' PRICE: ' ||COALESCE(fab_price,0),case when fab_received isnull then etd else fab_received end,fab_price
	order by zroh,fab_received,fab_price,'#INV: '||coalesce(fab_inv_no,'EX-MILL '||fab_inv_po)||' ETD: '||etd || ' PRICE: ' ||COALESCE(fab_price,0);

	
	
	FOR r1 IN select * from prominent.v_fabric_issued where zroh = vzroh ORDER BY zroh, original_ex_date,received_date_sort, po_buyer,urutan_item,date_ship, id_detail
	LOOP
		qty_garment = r1.qty_cut;
		vcons = r1.consumption ;
		vneed = r1.qty_cut * r1.consumption ;

	        --FOR r2 IN select * from prominent.temp_penerimaan where (qty_in - qty_use) >= vcons ORDER BY zroh,fab_received,fab_price,keyy
	        FOR r2 IN select * from (select a.zroh,a.keyy,a.fab_received,a.fab_price,a.qty_in,coalesce(b.qty_use,0) as qty_use,a.qty_in - coalesce(b.qty_use,0) as sisa
			  from prominent.temp_penerimaan a
			  left join (select keyy,sum(qty_use)as qty_use from prominent.temp_pemakaian group by keyy) b on a.keyy = b.keyy
			  order by a.zroh,a.fab_received,a.fab_price,a.keyy)
			  where sisa >= vcons
			  ORDER BY zroh,fab_received,fab_price,keyy
		LOOP	
			hasil_garment = 0;
                
			if ( (r2.qty_in - r2.qty_use) >= vneed ) then
				--UPDATE prominent.t_po_style set pemakaian = 'last_pemakaian' ||' '|| r2.keyy || ' QTY: ' || qty_garment where id = r1.id_detail ;
				insert into prominent.temp_pemakaian values(r1.id_detail, r2.keyy , vneed,vcons,qty_garment) ;
				--UPDATE prominent.temp_penerimaan set qty_use = vneed where keyy = r2.keyy ;
				exit;

			else 
				hasil_garment = trunc((r2.qty_in - r2.qty_use) / vcons)  ;
				--UPDATE prominent.t_po_style set pemakaian = 'last_pemakaian' ||' '|| r2.keyy || ' QTY: ' || hasil_garment where id = r1.id_detail ;
				insert into prominent.temp_pemakaian values(r1.id_detail, r2.keyy ,( hasil_garment * vcons ),vcons,hasil_garment  ) ;
				--UPDATE prominent.temp_penerimaan set qty_use = prominent.temp_penerimaan.qty_use + ( hasil_garment * vcons ) where keyy = r2.keyy ;
				vneed = vneed - ( hasil_garment * vcons ) ;
				qty_garment = qty_garment - hasil_garment ;				
			end if;
	    	end LOOP;

	end LOOP;
	
	update prominent.t_zroh set prn = 'Y' where zroh = vzroh;	
	select into pesan 'ok';
	
end;


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
    -- SELECT zroh,'#INV: '||fab_inv_no||' ETD: '||etd || ' PRICE: ' ||fab_price AS keyy,fab_received,fab_price, SUM(COALESCE(fab_qty_received,0) + COALESCE(auto_test_val,0)) AS qty_in,0 AS qty_use
    -- FROM prominent.v_fabric_received
    -- WHERE zroh = vzroh
    -- GROUP BY zroh,'#INV: '||fab_inv_no||' ETD: '||etd || ' PRICE: ' ||fab_price,fab_received,fab_price
    -- ORDER BY zroh,fab_received,fab_price,'#INV: '||fab_inv_no||' ETD: '||etd || ' PRICE: ' ||fab_price;

    SELECT 
        zroh,
        '#INV: '||COALESCE(fab_inv_no,'EX-MILL '||fab_inv_po)||' ETD: '||etd || ' PRICE: ' ||COALESCE(fab_price,0) AS keyy,
        CASE 
            WHEN fab_received IS NULL THEN etd 
            ELSE fab_received 
        END AS fab_received,
        fab_price, 
        SUM((CASE 
                WHEN COALESCE(fab_qty_received,0) = 0 THEN COALESCE(fab_qty_inv,0) 
                ELSE COALESCE(fab_qty_received,0) 
            END) + COALESCE(auto_test_val,0)) AS qty_in,
        0 AS qty_use
    FROM prominent.v_fabric_received
    WHERE zroh = '108526'
    GROUP BY 
        zroh,
        '#INV: '||COALESCE(fab_inv_no,'EX-MILL '||fab_inv_po)||' ETD: '||etd || ' PRICE: ' ||COALESCE(fab_price,0),
        CASE 
            WHEN fab_received IS NULL THEN etd 
            ELSE fab_received 
        END,
        fab_price
    ORDER BY 
        zroh,
        fab_received,
        fab_price,
        '#INV: '||COALESCE(fab_inv_no,'EX-MILL '||fab_inv_po)||' ETD: '||etd || ' PRICE: ' ||COALESCE(fab_price,0);

    FOR r1 IN 
        SELECT * 
        FROM prominent.v_fabric_issued 
        WHERE zroh = vzroh 
        ORDER BY zroh, original_ex_date,received_date_sort, po_buyer,urutan_item,date_ship, id_detail
    LOOP
        qty_garment = r1.qty_cut;
        vcons = r1.consumption;
        vneed = r1.qty_cut * r1.consumption;

        -- FOR r2 IN SELECT * FROM prominent.temp_penerimaan WHERE (qty_in - qty_use) >= vcons ORDER BY zroh,fab_received,fab_price,keyy
        FOR r2 IN 
            SELECT * 
            FROM (
                SELECT 
                    a.zroh,
                    a.keyy,
                    a.fab_received,
                    a.fab_price,
                    a.qty_in,
                    COALESCE(b.qty_use,0) AS qty_use,
                    a.qty_in - COALESCE(b.qty_use,0) AS sisa
                FROM prominent.temp_penerimaan a
                LEFT JOIN (
                    SELECT 
                        keyy,
                        SUM(qty_use) AS qty_use 
                    FROM prominent.temp_pemakaian 
                    GROUP BY keyy
                ) b 
                ON a.keyy = b.keyy
                ORDER BY a.zroh, a.fab_received, a.fab_price, a.keyy
            )
            WHERE sisa >= vcons
            ORDER BY zroh, fab_received, fab_price, keyy
        LOOP    
            hasil_garment = 0;

            IF ((r2.qty_in - r2.qty_use) >= vneed) THEN
                -- UPDATE prominent.t_po_style SET pemakaian = 'last_pemakaian' ||' '|| r2.keyy || ' QTY: ' || qty_garment WHERE id = r1.id_detail;
                INSERT INTO prominent.temp_pemakaian 
                VALUES (r1.id_detail, r2.keyy, vneed, vcons, qty_garment);
                -- UPDATE prominent.temp_penerimaan SET qty_use = vneed WHERE keyy = r2.keyy;
                EXIT;
            ELSE
                hasil_garment = TRUNC((r2.qty_in - r2.qty_use) / vcons);
                -- UPDATE prominent.t_po_style SET pemakaian = 'last_pemakaian' ||' '|| r2.keyy || ' QTY: ' || hasil_garment WHERE id = r1.id_detail;
                INSERT INTO prominent.temp_pemakaian 
                VALUES (r1.id_detail, r2.keyy, (hasil_garment * vcons), vcons, hasil_garment);
                -- UPDATE prominent.temp_penerimaan SET qty_use = prominent.temp_penerimaan.qty_use + (hasil_garment * vcons) WHERE keyy = r2.keyy;
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

