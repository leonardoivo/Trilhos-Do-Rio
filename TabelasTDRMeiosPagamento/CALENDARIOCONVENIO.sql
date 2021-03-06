-- ESIM.dbo.CALENDARIOCONVENIO definition

-- Drop table

-- DROP TABLE ESIM.dbo.CALENDARIOCONVENIO GO

CREATE TABLE ESIM.dbo.CALENDARIOCONVENIO (
	CALENDARIOCONVENIOID int IDENTITY(1,1) NOT NULL,
	CONVENIOID smallint NULL,
	DATAVENCIMENTO date NOT NULL,
	DATAGERACAOREMESSA date NULL,
	DATACRIACAO date NOT NULL,
	OBSERVACAO varchar(200) COLLATE Latin1_General_CI_AI NULL,
	USUARIOID int NULL,
	DATAFATURAMENTO date NULL,
	COMPETENCIA date NULL,
	DIAVENCIMENTO smallint NULL,
	DATALIMITEUSUARIO date NULL,
	STATUSCALENDARIOCONVENIOID smallint DEFAULT 1 NOT NULL,
	NUMEROLOTE smallint NULL,
	DATASTATUS date NULL,
	CONSTRAINT PK_CALENDARIOCONVENIO PRIMARY KEY (CALENDARIOCONVENIOID)
) GO
 CREATE NONCLUSTERED INDEX CALENDARIOCONVENIO_COMPETENCIA ON dbo.CALENDARIOCONVENIO (  COMPETENCIA ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX CALENDARIOCONVENIO_DATAFATURAMENTO ON dbo.CALENDARIOCONVENIO (  DATAFATURAMENTO ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX CALENDARIOCONVENIO_STATUSCALENDARIOCONVENIOID ON dbo.CALENDARIOCONVENIO (  STATUSCALENDARIOCONVENIOID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_CALENDARIOCONVENIO_DATAFATURAMENTO ON dbo.CALENDARIOCONVENIO (  COMPETENCIA ASC  , DIAVENCIMENTO ASC  , CONVENIOID ASC  , DATAFATURAMENTO ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CALENDARIOCONVENIO_CONVENIO ON dbo.CALENDARIOCONVENIO (  CONVENIOID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CALENDARIOCONVENIO_USUARIO ON dbo.CALENDARIOCONVENIO (  USUARIOID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO;


-- ESIM.dbo.CALENDARIOCONVENIO foreign keys

ALTER TABLE ESIM.dbo.CALENDARIOCONVENIO ADD CONSTRAINT FK_CALENDARIOCONVENIO_CONVENIO FOREIGN KEY (CONVENIOID) REFERENCES ESIM.dbo.CONVENIO(CONVENIOID) GO
ALTER TABLE ESIM.dbo.CALENDARIOCONVENIO ADD CONSTRAINT FK_CALENDARIOCONVENIO_USUARIO FOREIGN KEY (USUARIOID) REFERENCES ESIM.dbo.USUARIO(USUARIOID) GO;