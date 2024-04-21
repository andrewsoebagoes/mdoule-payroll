CREATE TABLE payroll_periods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

CREATE TABLE payroll_periods_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    period_id INT NOT NULL,
    user_id INT NOT NULL,
    salary FLOAT NOT NULL,
    note TEXT NOT NULL,
    status VARCHAR(100) NOT NULL,
    CONSTRAINT fk_payroll_periods_users_id FOREIGN KEY (period_id) REFERENCES payroll_periods(id) ON DELETE CASCADE,
    CONSTRAINT fk_payroll_users_user_id FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);