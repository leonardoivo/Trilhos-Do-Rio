-- ESIM.dbo.STATUSLOTEMOVIMENTACAOCOBRANCA definition

-- Drop table

-- DROP TABLE ESIM.dbo.TIPOLOTEMOVIMENTACAOCOBRANCA GO

CREATE TABLE ESIM.dbo.STATUSLOTEMOVIMENTACAOCOBRANCA (
	STATUSLOTEMOVIMENTACAOCOBRANCAID smallint NOT NULL,
	SIGLA varchar(20) COLLATE Latin1_General_CI_AI NULL,
	DESCRICAO varchar(100) COLLATE Latin1_General_CI_AI NULL,
	ORDEMAPRESENTACAO smallint NULL,
	EXCLUIDO smallint NULL,
	CONSTRAINT PK_STATUSLOTEMOVIMENTACAOCOBRANCA PRIMARY KEY (STATUSLOTEMOVIMENTACAOCOBRANCAID)
) GO;