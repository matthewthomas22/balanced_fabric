SELECT 
    c.id AS id_detail, 
    c.zroh, 
    c.original_ex_date, 
    CASE
        WHEN e.last_value IS NULL OR e.last_value = ''::text 
        THEN to_char(a.date_receive, 'dd/Mon/yyyy'::character varying)
        ELSE e.last_value
    END AS received_date, 
    CASE
        WHEN e.last_value IS NULL OR e.last_value = ''::text 
        THEN to_char(a.date_receive, 'yyyy-MM-dd'::character varying)
        ELSE to_char(to_date(e.last_value, 'dd/Mon/yyyy'::character varying), 'yyyy-MM-dd'::character varying)
    END AS received_date_sort, 
    a.po_buyer, 
    a.season, 
    b.description, 
    c.fab_category, 
    c.style, 
    c.fab_content, 
    c.fab_color, 
    CASE
        WHEN f.yields IS NOT NULL THEN f.yields
        WHEN c.fab_consp_act IS NOT NULL THEN c.fab_consp_act
        ELSE c.fab_consp_plan
    END AS consumption, 
    CASE
        WHEN c.additional10 IS NOT NULL OR c.additional10 <> ''::text THEN 'APPROVE'::text
        WHEN f.yields IS NOT NULL THEN 'ACTUAL'::text
        WHEN c.fab_consp_act IS NOT NULL THEN 'OK'::text
        ELSE 'EST'::text
    END AS status_cons, 
    d.qty AS qty_po_ori, 
    c.qty AS qty_cut, 
    c.date_ship, 
    CASE
        WHEN f.yields IS NOT NULL THEN f.yields
        WHEN c.fab_consp_act IS NOT NULL THEN c.fab_consp_act
        ELSE c.fab_consp_plan
    END * (c.qty)::numeric(10,2) AS qty_issued, 
    c.fab_consp_act, 
    c.fab_consp_plan, 
    f.id, 
    f.received_marker_consp, 
    f.remark_avg_size, 
    f.fab_width, 
    f.original_cons_ctc, 
    CASE
        WHEN f.actual_fab_width IS NULL OR f.actual_fab_width = ''::text THEN c.additional8
        ELSE f.actual_fab_width
    END AS actual_fab_width, 
    f.avg_size, 
    f.exfty_actual, 
    f.shipment_actual, 
    f.remark1, 
    xx.pemakaian AS remark2, 
    f.po_status, 
    f.yields, 
    c.po_status AS po_status_new, 
    c.po_remark, 
    CASE
        WHEN b.description = 'PANT'::text THEN '1'::text
        WHEN b.description = 'VEST'::text THEN '2'::text
        WHEN b.description = 'BLAZER'::text THEN '3'::text
        ELSE NULL
    END AS urutan_item, 
    c.additional16 AS date_marker_ctc_approval, 
    c.avg_size AS avg_size_new, 
    c.additional8 AS fab_width_new, 
    xx.pemakaian
FROM 
    prominent.t_po_buyer a
JOIN 
    prominent.t_po_mill b ON a.id = b.id_po
JOIN 
    prominent.t_po_style c ON b.id = c.id_mill
LEFT JOIN 
    prominent.v_rekap_qty d ON a.po_buyer = d.po_buyer 
        AND a.season = d.season 
        AND b.description = d.description 
        AND c.style = d.style 
        AND c.zroh = d.zroh 
        AND c.original_ex_date = d.original_ex_date
LEFT JOIN (
    SELECT 
        DISTINCT ON (t_po_history.no_po) t_po_history.no_po, 
        CASE
            WHEN t_po_history.last_value IS NULL OR t_po_history.last_value = ''::text 
            THEN t_po_history.new_value
            ELSE t_po_history.last_value
        END AS last_value
    FROM 
        prominent.t_po_history
    WHERE 
        t_po_history.category = 'update tgl rcvd po'::text 
        AND t_po_history.last_value IS NOT NULL
    ORDER BY 
        t_po_history.no_po, 
        t_po_history.id
) e ON a.po_buyer = e.no_po
LEFT JOIN 
    prominent.t_balanced_fabric f ON c.id = f.id
LEFT JOIN (
    SELECT 
        temp_pemakaian.id, 
        string_agg(
            (temp_pemakaian.keyy || ' QTY: '::text) || (temp_pemakaian.qty_garment)::text, ', '::text
        ) AS pemakaian
    FROM 
        prominent.temp_pemakaian
    WHERE 
        temp_pemakaian.qty_garment > 5 --Untuk menghilangkan yang hanya sisa satu qty (SEBELUMNYA GAADA)
    GROUP BY 
        temp_pemakaian.id
) xx ON c.id = xx.id
WHERE 
    a.buyer = 28 
    AND (c.qty IS NOT NULL OR c.qty > 0)
ORDER BY 
    c.zroh, 
    c.original_ex_date, 
    CASE
        WHEN e.last_value IS NULL OR e.last_value = ''::text 
        THEN to_char(a.date_receive, 'yyyy-MM-dd'::character varying)
        ELSE to_char(to_date(e.last_value, 'dd/Mon/yyyy'::character varying), 'yyyy-MM-dd'::character varying)
    END, 
    a.po_buyer, 
    CASE
        WHEN b.description = 'PANT'::text THEN '1'::text
        WHEN b.description = 'VEST'::text THEN '2'::text
        WHEN b.description = 'BLAZER'::text THEN '3'::text
        ELSE NULL
    END, 
    c.date_ship, 
    c.id;
