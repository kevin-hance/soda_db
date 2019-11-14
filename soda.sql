CREATE TABLE manufac_location(
    location_id INT UNSIGNED,
    location_street_address VARCHAR(50)
    location_city VARCHAR(50)
    location_state_province VARCHAR(50)
    location_country VARCHAR(50)
    location_postal_address VARCHAR(20)
    PRIMARY KEY (location_id)
);

CREATE TABLE manufacturer(
    manufac_id INT UNSIGNED,
    manufac_name VARCHAR(50) NOT NULL,
    location_id INT UNSIGNED NOT NULL,
    net_worth INT UNSIGNED NOT NULL,
    PRIMARY KEY (manufac_id),
    FOREIGN KEY (manufac_location_id) REFERENCES manufac_location (location_id),
);

CREATE TABLE soda_type(
    soda_type_id INT UNSIGNED,
    soda_type_name VARCHAR(50) NOT NULL, 
    PRIMARY KEY (soda_type_id)
);

CREATE TABLE flavor(
    flavor_id INT UNSIGNED,
    flavor_name VARCHAR(50) NOT NULL,
    PRIMARY KEY (flavor_id)
);

CREATE TABLE drink(
    drink_id INT UNSIGNED,
    drink_name VARCHAR(50) NOT NULL,
    manufac_id INT UNSIGNED NOT NULL,
    caffeine_content INT UNSIGNED NOT NULL,
    sugar_content INT UNSIGNED NOT NULL,
    sodium_content INT UNSIGNED NOT NULL,
    serving_size INT UNSIGNED NOT NULL,
    soda_type_id INT UNSIGNED NOT NULL,
    flavor_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (drink_id),
    FOREIGN KEY (manufac_id) REFERENCES manufacturer (manufac_id),
    FOREIGN KEY (soda_type_id) REFERENCES soda_type (soda_type_id),
    FOREIGN KEY (flavor_id) REFERENCES flavor (flavor_id)
);
