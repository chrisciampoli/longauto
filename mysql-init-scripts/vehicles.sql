CREATE TABLE vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    year INT NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

INSERT INTO vehicles (make, model, year, price)
VALUES ('Ford', 'Mustang', 2022, 55999.99),
       ('Chevrolet', 'Camaro', 2022, 54999.99),
       ('Dodge', 'Challenger', 2022, 52999.99),
       ('Toyota', 'Supra', 2022, 50999.99),
       ('Nissan', '370Z', 2022, 42999.99);
