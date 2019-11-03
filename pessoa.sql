CREATE TABLE client (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128) NOT NULL,
        email varchar(128) NOT NULL,
        adress varchar(128) NOT NULL,
		cpf varchar(128) NOT NULL,
        PRIMARY KEY (id),
        KEY cpf (cpf)
);

	CREATE TABLE product (
			id int(11) NOT NULL AUTO_INCREMENT,
			name varchar(128) NOT NULL,
			qtd int(11) NOT NULL,
			cod int(128) NOT NULL,
			PRIMARY KEY (id),
			KEY codigo (codigo)
	);

	CREATE TABLE orders (
		id int(11) NOT NULL AUTO_INCREMENT,
		description varchar(128) NOT NULL,
		clientName varchar (128) NOT NULL,
		productName varchar (128) NOT NULL,
		idClientes int NOT NULL,
		idproduct int NOT NULL,
		PRIMARY KEY (id),
		FOREIGN KEY(idClientes) REFERENCES client(id),
		FOREIGN KEY(idproduct) REFERENCES product(id)
	);