SELECT  p.email, p.name,
    MAX(CASE WHEN meta_key = "ip_address" THEN meta_value ELSE NULL END) AS ip_address,
    MAX(CASE WHEN meta_key = "referrer" THEN meta_value ELSE NULL END) AS referrer,
    MAX(CASE WHEN meta_key = "user_agent" THEN meta_value ELSE NULL END) AS user_agent,
    u.url_path
FROM tbl_users_images u LEFT JOIN tbl_users p on p.id = u.users_id inner join tbl_users_meta m on p.id = m.users_id  GROUP BY p.id