DROP TABLE IF EXISTS drink;
DROP TABLE IF EXISTS flavor;
DROP TABLE IF EXISTS drink_type;
DROP TABLE IF EXISTS manufacturer;
DROP TABLE IF EXISTS manufac_location;


CREATE TABLE manufac_location(
    location_id INT UNSIGNED,
    location_street_address VARCHAR(50) NOT NULL,
    location_city VARCHAR(50) NOT NULL,
    location_state_province VARCHAR(50) NOT NULL,
    location_country VARCHAR(50) NOT NULL,
    location_postal_address VARCHAR(20) NOT NULL,
    PRIMARY KEY (location_id)
);

CREATE TABLE manufacturer(
    manufac_id INT UNSIGNED,
    manufac_name VARCHAR(50) NOT NULL,
    location_id INT UNSIGNED NOT NULL,
    net_worth INT UNSIGNED NOT NULL,
    PRIMARY KEY (manufac_id),
    FOREIGN KEY (manufac_location_id) REFERENCES manufac_location (location_id)
);

CREATE TABLE drink_type(
    drink_type_id INT UNSIGNED,
    drink_type_name VARCHAR(50) NOT NULL, 
    PRIMARY KEY (drink_type_id)
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
    drink_type_id INT UNSIGNED NOT NULL,
    flavor_id INT UNSIGNED NOT NULL,
    PRIMARY KEY (drink_id),
    FOREIGN KEY (manufac_id) REFERENCES manufacturer (manufac_id),
    FOREIGN KEY (drink_type_id) REFERENCES drink_type (drink_type_id),
    FOREIGN KEY (flavor_id) REFERENCES flavor (flavor_id)
);
