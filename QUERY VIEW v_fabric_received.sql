-- View: prominent.v_fabric_received

-- DROP VIEW prominent.v_fabric_received;

CREATE OR REPLACE VIEW prominent.v_fabric_received AS 
SELECT 
    a.id, 
    b.id AS id_detail, 
    a.fab_vendor, 
    a.fab_inv_no, 
    a.pr, 
    CASE
        WHEN b.fab_inv_po IS NULL OR b.fab_inv_po = ''::text THEN a.fab_inv_po
        ELSE b.fab_inv_po
    END AS fab_inv_po, 
    a.etd, 
    a.eta, 
    a.fab_received, 
    b.zroh, 
    b.fab_content_inv, 
    c.konten, 
    b.micro_count, 
    b.fab_price, 
    b.fab_qty_inv, 
    b.fab_qty_received, 
    b.auto_test_val, 
    b.remark_test
FROM 
    prominent.t_invoice a
JOIN 
    prominent.t_invoice_detail b 
    ON a.id = b.id_inv
LEFT JOIN 
    prominent.t_zroh c 
    ON b.zroh = c.zroh;

ALTER TABLE prominent.v_fabric_received OWNER TO postgres;
