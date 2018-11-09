CREATE TABLE produto(
    codigo_de_barras BIGINT NOT NULL PRIMARY KEY,
    nome VARCHAR(200) NOT NULL,
    preco_de_venda DECIMAL(10,2) NOT NULL,
    preco_de_compra DECIMAL(10,2) NOT NULL,
    quantidade_estoque INTEGER NOT NULL,
    validade DATE
);
CREATE TABLE entrada_produto(
    id_entrada SERIAL NOT NULL PRIMARY KEY,
    codigo_de_barras BIGINT NOT NULL,
    quantidade_comprada INTEGER NOT NULL,
    valor_total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (codigo_de_barras) REFERENCES produto(codigo_de_barras)
);
CREATE TABLE saida_produto(
    id_saida SERIAL NOT NULL PRIMARY KEY,
    codigo_de_barras BIGINT NOT NULL,
    quantidade INTEGER NOT NULL,
    valor_total DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (codigo_de_barras) REFERENCES produto(codigo_de_barras)
);
CREATE TABLE endereco(
    id_endereco SERIAL NOT NULL PRIMARY KEY,
    rua VARCHAR(200) NOT NULL,
    numero VARCHAR(10) NOT NULL,
    bairro VARCHAR(30) NOT NULL,
    cidade VARCHAR(30) NOT NULL,
    estado VARCHAR(2) NOT NULL
);
CREATE TABLE emprestimo(
    id_emprestimo SERIAL NOT NULL PRIMARY KEY,
    id_saida INTEGER NOT NULL,
    id_endereco INTEGER NOT NULL,
    vasilhame BOOLEAN NOT NULL,
    devolucao BOOLEAN NOT NULL,
    data_devolucao DATE,
    data_a_devolver DATE,
    FOREIGN KEY (id_saida) REFERENCES saida_produto(id_saida),
    FOREIGN KEY (id_endereco) REFERENCES endereco(id_endereco)
);
CREATE TABLE pagamento(
    id_pagamento SERIAL NOT NULL PRIMARY KEY,
    tipo VARCHAR(100) NOT NULL
);
CREATE TABLE pessoa(
    id_pessoa SERIAL NOT NULL PRIMARY KEY,
    id_endereco INTEGER NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    RG VARCHAR(17) NOT NULL,
    nome VARCHAR(300) NOT NULL,
    data_de_nascimento DATE NOT NULL,
    telefone BIGINT,
    FOREIGN KEY (id_endereco) REFERENCES endereco(id_endereco)
);
CREATE TABLE fornecedor(
    cnpj VARCHAR(14) NOT NULL PRIMARY KEY,
    nome VARCHAR(300) NOT NULL,
    telefone BIGINT NOT NULL,
    id_pessoa INTEGER
);
CREATE TABLE compra(
    id_compra SERIAL NOT NULL PRIMARY KEY,
    cnpj VARCHAR(14) NOT NULL,
    id_entrada INTEGER NOT NULL,
    id_pagamento INTEGER NOT NULL,
    hora_data TIMESTAMP WITHOUT TIME ZONE NOT NULL,
    valor_total DECIMAL(10,2),
    FOREIGN KEY (cnpj) REFERENCES fornecedor(cnpj),
    FOREIGN KEY (id_entrada) REFERENCES entrada_produto(id_entrada),
    FOREIGN KEY (id_pagamento) REFERENCES pagamento(id_pagamento)
);
CREATE TABLE funcionarios(
    id_funcionario SERIAL NOT NULL PRIMARY KEY,
    id_pessoa INTEGER NOT NULL,
    login VARCHAR(12) NOT NULL,
    senha VARCHAR(10) NOT NULL,
    administrador BOOLEAN NOT NULL,
    FOREIGN KEY (id_pessoa) REFERENCES pessoa(id_pessoa)
);
CREATE TABLE referencia_comercial(
    id_referencia_comercial SERIAL NOT NULL PRIMARY KEY,
    referencia_1 VARCHAR(100),
    referencia_2 VARCHAR(100),
    referencia_3 VARCHAR(100)
);
CREATE TABLE cliente(
    id_cliente SERIAL NOT NULL PRIMARY KEY,
    id_referencia_comercial INTEGER NOT NULL,
    limite_de_credito DECIMAL(10,2) NOT NULL,
    id_pessoa INTEGER,
    FOREIGN KEY (id_referencia_comercial) REFERENCES
    referencia_comercial(id_referencia_comercial),
    FOREIGN KEY (id_pessoa) REFERENCES pessoa(id_pessoa)
);
CREATE TABLE vendas(
    id_venda SERIAL NOT NULL PRIMARY KEY,
    id_emprestimo INTEGER NOT NULL,
    id_funcionario INTEGER NOT NULL,
    data_horario TIMESTAMP WITHOUT TIME ZONE NOT NULL,
    valor_total DECIMAL(10,2) NOT NULL,
    id_cliente INTEGER,
    id_pagamento INTEGER,
    limite_restante DECIMAL(10,2),
    FOREIGN KEY (id_emprestimo) REFERENCES emprestimo(id_emprestimo),
    FOREIGN KEY (id_funcionario) REFERENCES funcionarios(id_funcionario),
    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente),
    FOREIGN KEY (id_pagamento) REFERENCES pagamento(id_pagamento)
);