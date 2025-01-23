SELECT SUM(qty) AS qty
FROM (
    SELECT *
    FROM (
        SELECT 
            b.id,
            b.zroh,
            a.fab_inv_no AS note,
            a.fab_received AS tgl,
            COALESCE(b.fab_qty_received, 0) AS qty,
            a.fab_received || b.id || '1' AS urutan
        FROM prominent.t_invoice a
        JOIN prominent.t_invoice_detail b ON a.id = b.id_inv
        WHERE a.fab_received IS NOT NULL AND b.zroh = '144749'
        
        UNION ALL
        
        SELECT 
            b.id,
            b.zroh,
            'Test Shrinkage' AS note,
            a.fab_received AS tgl,
            COALESCE(b.auto_test_val, 0) AS qty,
            a.fab_received || b.id || '2' AS urutan
        FROM prominent.t_invoice a
        JOIN prominent.t_invoice_detail b ON a.id = b.id_inv
        WHERE a.fab_received IS NOT NULL AND b.zroh = '144749'
        
        ORDER BY zroh, id ASC, qty DESC
    )
    
    UNION ALL
    
    SELECT 
        id,
        zroh,
        additional AS note,
        TO_CHAR(input_date, 'yyyy-MM-dd')::DATE AS tgl,
        COALESCE(qty, 0) AS qty,
        TO_CHAR(input_date, 'yyyy-MM-dd') || id || '0' AS urutan
    FROM prominent.t_additional
    WHERE zroh = '144749'
    
    ORDER BY urutan
) AS combined;
