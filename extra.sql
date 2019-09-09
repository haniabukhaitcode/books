DROP DATABASE IF EXISTS test;
CREATE DATABASE IF NOT EXISTS test;
CREATE TABLE company (
  company_id INTEGER PRIMARY KEY,
  company_name VARCHAR(300) NOT NULL
);
CREATE TABLE employee (
  employee_id INTEGER PRIMARY KEY,
  employee_name VARCHAR(100) NOT NULL
);
CREATE TABLE company_employee (
  company_id INTEGER NOT NULL,
  employee_id INTEGER NOT NULL,
  FOREIGN KEY (company_id) REFERENCES company (company_id) ON DELETE RESTRICT ON UPDATE CASCADE,
  FOREIGN KEY (employee_id) REFERENCES employee (employee_id) ON DELETE RESTRICT ON UPDATE CASCADE,
  PRIMARY KEY (company_id, employee_id)
);
SELECT
  e.employee_name,
  c.company_name
FROM
  employee e
  INNER JOIN company_employee ec ON e.employee_id = ec.employee_id --  employee_id INTEGER NOT NULL,
  INNER JOIN company c ON c.company_id = ec.company_id;