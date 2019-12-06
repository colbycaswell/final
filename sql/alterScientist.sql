ALTER TABLE `scientist` 
ADD COLUMN `username` VARCHAR(45) NULL AFTER `address`,
ADD COLUMN `password` VARCHAR(100) NULL AFTER `username`,
ADD UNIQUE INDEX `username_UNIQUE` (`username` ASC);

UPDATE scientist
SET username = "admin",
    password = 'password'
WHERE customerID = 1