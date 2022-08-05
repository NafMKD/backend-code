-- calls agents
CREATE TABLE agents(
    id int AUTO_INCREMENT PRIMARY KEY,
    name varchar(100),
    rdate DATETIME DEFAULT CURRENT_TIMESTAMP
)

-- calls database
CREATE TABLE calls(
    id int AUTO_INCREMENT PRIMARY KEY,
    agent int,
    name varchar(100),
    status ENUM('0','1') DEFAULT '0' COMMENT '0 -> not meaningfull, 1-> meaningfull',
    rdate DATE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(agent) REFERENCES agents(id)
)

-- calls quotation
CREATE TABLE quotation(
    id int AUTO_INCREMENT PRIMARY KEY,
    agent int,
    name varchar(100),
    value REAL,
    status ENUM('0','1') NULL DEFAULT '0' COMMENT '0 -> not done, 1 -> done',
    rdate DATE DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(agent) REFERENCES agents(id)
)