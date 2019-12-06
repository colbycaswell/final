
CREATE TABLE scientist
( scientistid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  name CHAR(50) NOT NULL,
  address CHAR(100) NOT NULL
);

CREATE TABLE entries
( entryid INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  scientistid INT UNSIGNED NOT NULL,
  date DATE NOT NULL
);

CREATE TABLE planets
(  name CHAR(25) NOT NULL PRIMARY KEY,
   mass INT UNSIGNED,
   period INT UNSIGNED,
   distance INT UNSIGNED
);

INSERT INTO scientist VALUES
  (NULL, "Neil Armstrong", "2475 K St # 3, Wright-Patterson AFB"),
  (NULL, "Elon Musk", "Rocket Rd Hawthorne"),
  (NULL, "Andrew Rush", "8226 Philips Highway");

INSERT INTO entries VALUES
  (NULL, 1, "2018-06-02"),
  (NULL, 2, "2019-04-15"),
  (NULL, 3, "2019-04-19"),
  (NULL, 4, "2019-05-01");

INSERT INTO planets VALUES
  ("7 Canis Majoris c", 0.87, 996.00, 64.6),
  ("Beta Pictoris c", 9, 1200, 64.43),
  ("CI Tauri b", 11.6, 8.9891, 515.3),
  ("DS Tucanae Ab", NULL, 8.138268, 143.89),
  ("Epsilon Indi Ab", 3.25, 16510, 11.87),
  ("Gliese 49 b", 0.0177, 13.850, 32.145),
  ("Gliese 143 b", 0.09637, 35.589, 53.25),
  ("Gliese 357 b", 0.00579, 3.93072, 30.80);
