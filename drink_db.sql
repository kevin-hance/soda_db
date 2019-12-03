DROP TABLE IF EXISTS drink;
DROP TABLE IF EXISTS flavor;
DROP TABLE IF EXISTS drink_type;
DROP TABLE IF EXISTS user;
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

CREATE TABLE user (
    user_id INT UNSIGNED AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    user_password VARCHAR(50) NOT NULL,
    user_typer CHAR(1) NOT NULL,
    PRIMARY KEY (user_id)
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

CREATE TABLE favorite (
    user_id INT UNSIGNED,
    drink_id INT UNSIGNED,
    PRIMARY KEY (user_id, drink_id),
    FOREIGN KEY (user_id) REFERENCES user (user_id),
    FOREIGN KEY (drink_id) REFERENCES drink (drink_id)
);

INSERT INTO manufac_location VALUES(1, "106 E Meme Street", "Spokane", "Washington",
"United States", "PO BOX 77768");
INSERT INTO manufac_location VALUES(2, "123 E Boone Avenue", "Seattle","Washington",
"United States", "PO BOX 6588");
INSERT INTO manufac_location VALUES(3, "321 W Boof Boulevard", "Bellingham","Washington",
"United States", "PO BOX 8431");
INSERT INTO manufac_location VALUES(4, "89123 NE 344th Ct.", "Cheesetown","Oregon",
"United States", "PO BOX 32841");

INSERT INTO manufacturer VALUES(1,"Pepsi Co",1,5000000);
INSERT INTO manufacturer VALUES(2,"Coca-Cola Co",2,45000000);

INSERT INTO user VALUES(NULL, 'admin', 'admin', 'U');
INSERT INTO user VALUES(NULL, 'Bepsi', 'ImBepsi', 'M');

INSERT INTO flavor VALUES(1,"Cola");
INSERT INTO flavor VALUES(2,"Lemon-Lime");
INSERT INTO flavor VALUES(3,"Cherry");
INSERT INTO flavor VALUES(4,"Redbull");
INSERT INTO flavor VALUES(5,"Orange");
INSERT INTO flavor VALUES(6,"Grape");

INSERT INTO drink_type VALUES(1,"Soda");
INSERT INTO drink_type VALUES(2, "Health");
INSERT INTO drink_type VALUES(3, "Energy Drink");

/* drink_id, drink_name, manufac_id, caffeine_content, sugar_content, sodium_content, serving_size, drink_type_id, flavor_id */
INSERT INTO drink VALUES(1,"Bepsi",1,100,40,25,16,1,1);
INSERT INTO drink VALUES(2,"Coke",2,100,36,27,16,1,1);
INSERT INTO drink VALUES(3,"Mountain Loo",1,96,38,25,8,1,2);
INSERT INTO drink VALUES(4,"Cherry Bepsi",1,100,45,39,12,1,3);
INSERT INTO drink VALUES(5,"Vitamin Water Cherry",2,0,36,45,16,2,3);
INSERT INTO drink VALUES(6,"Bang Cherry",2,300,0,20,16,3,3);
INSERT INTO drink VALUES(7,"Sugarfree Redbull",1,81,0,15,8,3,4);
INSERT INTO drink VALUES(8,"Normal Redbull",1,81,20,15,8,3,4);
INSERT INTO drink VALUES(9,"Sprit",1,0,30,25,8,1,2);
INSERT INTO drink VALUES(10,"Orange Fantuh",2,0,30,25,8,1,5);
INSERT INTO drink VALUES(11,"Grape Fantuh",2,0,36,27,8,1,6);
INSERT INTO drink VALUES(12,"Orange Sprit",1,0,36,27,8,1,5);

INSERT INTO favorite VALUES(1, 1);
INSERT INTO favorite VALUES(1, 3);
INSERT INTO favorite VALUES(1, 8);

SELECT d.drink_name, f.flavor_name, dt.drink_type_name, d.sugar_content, d.caffeine_content
FROM drink d JOIN flavor f ON d.flavor_id = f.flavor_id
JOIN drink_type dt ON d.drink_type_id = dt.drink_type_id
ORDER BY d.drink_name ASC;

