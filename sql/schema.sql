\c postgres;
DROP DATABASE centre_analyse;

create database centre_analyse;
\c centre_analyse;

create table unite_oeuvre (
    id_unite_oeuvre serial primary key,
    nom_unite_oeuvre varchar
);

create table charge (
    id_charge serial primary key,
    nom_charge varchar,
    total float,
    nature boolean,
    id_unite_oeuvre int
);

create table centre_opp (
    id_centre_opp serial primary key,
    nom_centre_opp varchar,
    est_structure boolean default FALSE
);

create table centre_opp_charge (
    id serial primary key,
    id_centre_opp int,
    id_charge int,
    pourcentage float
);

create table etat_produit (
    id_etat_produit serial primary key,
    id_unite_oeuvre int,
    nom_etat varchar
);

create table etat_produit_centre_assoc(
    id_etat_produit int,
    id_centre_opp int
);

CREATE OR REPLACE VIEW v_all_data AS
SELECT
    ch.id_charge,
    ch.nom_charge,
    ch.total,
    ch.nature,
    uo.nom_unite_oeuvre,
    co.id_centre_opp,
    co.nom_centre_opp,
    co.est_structure,
    coc.pourcentage,
    CASE
        WHEN ch.nature = TRUE THEN ch.total * coc.pourcentage
        ELSE 0
    END AS variable,
    CASE
        WHEN ch.nature = FALSE THEN ch.total * coc.pourcentage
        ELSE 0
    END AS fixe
FROM
    charge ch
JOIN
    unite_oeuvre uo ON ch.id_unite_oeuvre = uo.id_unite_oeuvre
JOIN
    centre_opp_charge coc ON ch.id_charge = coc.id_charge
JOIN
    centre_opp co ON coc.id_centre_opp = co.id_centre_opp;



CREATE OR REPLACE VIEW v_desc_total_par_co AS
SELECT
    id_centre_opp,
    est_structure,
    SUM(CASE WHEN nature = TRUE THEN total * pourcentage  ELSE 0 END) AS sum_variable,
    SUM(CASE WHEN nature = FALSE THEN total * pourcentage ELSE 0 END) AS sum_fixe,
    SUM(CASE WHEN nature = TRUE OR nature = FALSE THEN total * pourcentage ELSE 0 END) AS sum_variable_fixe
FROM v_all_data
GROUP BY id_centre_opp,est_structure;


CREATE OR REPLACE VIEW v_desc_total_par_charge AS
SELECT
    id_charge,
    SUM(CASE WHEN nature = TRUE THEN total * pourcentage ELSE 0 END) AS total_sum_variable,
    SUM(CASE WHEN nature = FALSE THEN total * pourcentage ELSE 0 END) AS total_sum_fixe
FROM
    v_all_data
GROUP BY
    id_charge;


CREATE OR REPLACE VIEW v_table_analytique AS
SELECT
    a.id_charge,
    a.nom_charge,
    a.total,
    a.nature,
    a.nom_unite_oeuvre,
    a.id_centre_opp,
    a.nom_centre_opp,
    a.est_structure,
    a.pourcentage,
    a.variable,
    a.fixe,
    c.sum_variable,
    c.sum_fixe ,
    c.sum_variable_fixe ,
    ch.total_sum_variable,
    ch.total_sum_fixe
FROM
    v_all_data a
JOIN
    v_desc_total_par_co c ON a.id_centre_opp = c.id_centre_opp
JOIN
    v_desc_total_par_charge ch ON a.id_charge = ch.id_charge;


CREATE OR REPLACE VIEW total_descr AS
SELECT
    -- Agrégation des données depuis la première vue
    (SELECT SUM(a.total) FROM  a) AS sum_charge,

    -- Agrégation des données depuis la deuxième vue
    (SELECT SUM(b.total_sum_variable) FROM v_desc_total_par_charge b) AS sum_total_sum_variable,

    (SELECT SUM(b.total_sum_fixe) FROM v_desc_total_par_charge b) AS sum_total_sum_fixe;


CREATE OR REPLACE VIEW v_repartition AS
SELECT
    id_centre_opp,
    sum_variable_fixe as cout_direct,
    (SELECT sum(sum_variable_fixe) FROM v_desc_total_par_co WHERE est_structure = FALSE) as total_general,
    sum_variable_fixe / (SELECT sum(sum_variable_fixe) FROM v_desc_total_par_co WHERE est_structure = FALSE) as cles ,
    (SELECT sum(sum_charge) FROM total_descr) * (sum_variable_fixe / (SELECT sum(sum_variable_fixe) FROM v_desc_total_par_co WHERE est_structure = FALSE)) as "ADM/DIST",
    sum_variable_fixe + (SELECT sum(sum_charge) FROM total_descr) * (sum_variable_fixe / (SELECT sum(sum_variable_fixe) FROM v_desc_total_par_co WHERE est_structure = FALSE)) as cout_total
FROM
    v_desc_total_par_co
WHERE
    est_structure = FALSE;


CREATE OR REPLACE VIEW cout_grain AS
SELECT
    epca.id_centre_opp,
    co.nom_centre_opp,
    ep.nom_etat,
    uo.nom_unite_oeuvre,
    t.sum_variable_fixe as value
FROM
    etat_produit_centre_assoc epca
JOIN
    etat_produit ep ON epca.id_etat_produit = ep.id_etat_produit
JOIN
    v_desc_total_par_co t ON epca.id_centre_opp = t.id_centre_opp
JOIN unite_oeuvre uo ON uo.id_unite_oeuvre = ep.id_unite_oeuvre
JOIN centre_opp co ON co.id_centre_opp = epca.id_centre_opp;


-- Insertion de données dans la table unite_oeuvre
INSERT INTO unite_oeuvre (nom_unite_oeuvre)
VALUES
    ('kg'),
    ('tonne'),
    ('kw'),
    ('litre');


-- Insertion de données dans la table centre_opp
INSERT INTO centre_opp (nom_centre_opp, est_structure)
VALUES
    ('ADMIN', TRUE),
    ('Centre 2', FALSE),
    ('Centre 3', FALSE);

-- Insertion de données dans la table charge
INSERT INTO charge (nom_charge, total, nature, id_unite_oeuvre)
VALUES
    ('Electricité', 1000.50, TRUE, 3),  -- TRUE pour nature (par exemple: récurrent)
    ('Eau', 500.75, TRUE, 4),
    ('Salaries', 2000.00, FALSE, 2),   -- FALSE pour nature (par exemple: non récurrent)
    ('Maintenance', 800.20, FALSE, 3);


-- Insertion de données dans la table centre_opp_charge (chaque charge dans chaque centre)
INSERT INTO centre_opp_charge (id_centre_opp, id_charge, pourcentage)
VALUES
    -- Répartition pour la charge 'Electricité' (id_charge = 1)
    (1, 1, 0.33),
    (2, 1, 0.33),
    (3, 1, 0.34), -- On ajuste légèrement le dernier pourcentage pour obtenir 100%

    -- Répartition pour la charge 'Eau' (id_charge = 2)
    (1, 2, 0.33),
    (2, 2, 0.33),
    (3, 2, 0.34),

    -- Répartition pour la charge 'Salaries' (id_charge = 3)
    (1, 3, 0.33),
    (2, 3, 0.33),
    (3, 3, 0.34),

    -- Répartition pour la charge 'Maintenance' (id_charge = 4)
    (1, 4, 0.33),
    (2, 4, 0.33),
    (3, 4, 0.34);


INSERT INTO etat_produit (id_unite_oeuvre, nom_etat)
VALUES
    (1, 'Produit A'),  -- Produit A mesuré en kg
    (2, 'Produit B'),  -- Produit B mesuré en tonne
    (3, 'Produit C'),  -- Produit C mesuré en kw
    (4, 'Produit D');  -- Produit D mesuré en litre


-- Insertion de données dans la table etat_produit_centre_assoc
INSERT INTO etat_produit_centre_assoc (id_etat_produit, id_centre_opp)
VALUES
    (1, 1),  -- Produit A associé au centre d'opposition ADMIN
    (1, 2),  -- Produit A associé au centre d'opposition Centre 2
    (2, 1),  -- Produit B associé au centre d'opposition ADMIN
    (2, 3),  -- Produit B associé au centre d'opposition Centre 3
    (3, 2),  -- Produit C associé au centre d'opposition Centre 2
    (3, 3),  -- Produit C associé au centre d'opposition Centre 3
    (4, 1),  -- Produit D associé au centre d'opposition ADMIN
    (4, 2);  -- Produit D associé au centre d'opposition Centre 2
