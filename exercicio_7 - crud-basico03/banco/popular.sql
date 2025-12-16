USE CONSULTORIO;

/* Inserções na tabela de pacientes*/
INSERT INTO PACIENTE (NOME, DATA_NASCIMENTO, TIPO_SANGUINEO) VALUES (
	"Arthur Germano",
    "2025-02-02",
    "O-"
);

INSERT INTO PACIENTE (NOME, DATA_NASCIMENTO, TIPO_SANGUINEO) VALUES (
	"Lucas Bezerra", 
    "2028-08-05", 
    "AB+"
);

INSERT INTO PACIENTE (NOME, DATA_NASCIMENTO, TIPO_SANGUINEO) VALUES (
	"Alan Diego", 
    "2028-05-28", 
    "B+"
);

INSERT INTO PACIENTE (NOME, DATA_NASCIMENTO, TIPO_SANGUINEO) VALUES (
	"Gabriel Luna", 
    "2025-05-25", 
    "O+"
);

INSERT INTO PACIENTE (NOME, DATA_NASCIMENTO, TIPO_SANGUINEO) VALUES (
	"Elder Macena", 
    "2077-07-07", 
    "A+"
);

/* Inserções na tabela de médicos*/

INSERT INTO MEDICO (NOME, ESPECIALIDADE) VALUES (
	"Alexandre", 
    "Cardiologista"
);

INSERT INTO MEDICO (NOME, ESPECIALIDADE) VALUES (
	"Gustavo", 
    "Urologista"
);

INSERT INTO MEDICO (NOME, ESPECIALIDADE) VALUES (
	"Milton junior", 
    "Ortopedista"
);

INSERT INTO MEDICO (NOME, ESPECIALIDADE) VALUES (
	"Cícero", 
    "Otorrino"
);

INSERT INTO MEDICO (NOME, ESPECIALIDADE) VALUES (
	"Willianys", 
    "Psicólogo"
);




/* Inserções na tabela de consultas*/
INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (
	1, 2, "2025-05-08", "15:30:00", "Paciente apresentou insuficiência cardíaca. Administrar Enalapril durante 50 anos."
);

INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (
	1, 1, "2017-10-28", "07:45:00", "Realizamos um ECG. Paciente está saudável."
);

INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (
	3, 2, "2011-10-17", "10:15:00", "Paciente apresentou queixas de dores no joelho esquerdo. Solicito encaminhamento para raio-x de perfil do joelho"
);

INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (
	5, 1, "2011-10-17", "10:15:00", ""
);

INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (
	3, 5, "2018-01-01", "07:00:00", "Paciente deu entrada da emergência após cair da bicicleta e quebrar o braço direito. Encaminho para o raio-x e depois para colocar gesso."
);

INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (
	2, 4, "2005-11-25", "10:30:00", "Paciente estava com queixas de dores ao urinar. Possível infecção na uretra. Administrar Amoxicilina por 7 dias e retornar para nova consulta."
);

INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (
	2, 4, "1992-03-30", "10:30:00", "Paciente obteve melhoras da infecção."
);

INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (
	4, 4, "2013-04-07", "07:40:00", "Paciente estava sentido muita dor de ouvido."
);

INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (
	2, 5, "2015-08-15", "07:40:00", "Foi realizado exame de próstata."
);

INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (
	4, 3, "2028-01-01", "08:00:00", "Paciente estava sentido queixas de dores no ouvido após soltar fogos no ano-novo"
);

INSERT INTO CONSULTA (ID_MEDICO, ID_PACIENTE, DATA_CONSULTA, HORA_CONSULTA, OBSERVACAO) VALUES (
	5, 3, "2077-03-25", "08:50:00", ""
);