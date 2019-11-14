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
    FOREIGN KEY (location_id) REFERENCES manufac_location (location_id)
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

INSERT INTO manufac_location VALUES(1, "106 E Meme Street", "Spokane", "Washington",
"United States", "PO BOX 77768");
INSERT INTO manufac_location VALUES(2, "123 E Boone Avenue", "Seattle","Washington",
"United States", "PO BOX 6588");

INSERT INTO manufacturer VALUES(1,"Pepsi Co",1,5000000);
INSERT INTO manufacturer VALUES(2,"Coca-cola Co",2,45000000);

INSERT INTO flavor VALUES(1,"Cola");
INSERT INTO flavor VALUES(2,"Lemon-Lime");
INSERT INTO flavor VALUES(3,"Cherry");

INSERT INTO drink_type VALUES(1,"Soda");
INSERT INTO drink_type VALUES(2, "Health");

INSERT INTO drink VALUES(1,"Bepsi",1,100,40,25,16,1,1);
INSERT INTO drink VALUES(2,"Coke",2,100,36,27,16,1,1);
INSERT INTO drink VALUES(3,"Mountain Loo",1,96,38,25,8,1,2);
INSERT INTO drink VALUES(4,"Cherry Bepsi",1,100,45,39,12,1,3);
INSERT INTO drink VALUES(5,"Vitamin Water Cherry",2,0,36,45,16,2,3);

SELECT *
FROM drink d JOIN flavor f ON 