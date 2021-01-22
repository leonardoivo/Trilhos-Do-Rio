-- ESIM.dbo.CONVENIOBANCARIO definition

-- Drop table

-- DROP TABLE ESIM.dbo.CONVENIOBANCARIO GO

CREATE TABLE ESIM.dbo.CONVENIOBANCARIO (
	CONVENIOID smallint NOT NULL,
	TIPOREPASSEID smallint NULL,
	STATUSCONVENIOID smallint NOT NULL,
	TIPOQTDEDIASREPASSECONTRATO_TI smallint NULL,
	CONTAARRECADACAOID smallint NOT NULL,
	PERIODICIDADEGERACAO_PERIODICI smallint NULL,
	TIPOQTDEDIASRETORNO_TIPOQTDEDI smallint NULL,
	TIPOQTDEDIASREPASSEPRATICA_TIP smallint NULL,
	CEDENTE_PESSOAID int NULL,
	NOMECONVENIO varchar(100) COLLATE Latin1_General_CI_AI NULL,
	NUMEROCONVENIO bigint NULL,
	NUMEROCONTRATO varchar(50) COLLATE Latin1_General_CI_AI NULL,
	DATACONTRATO date NULL,
	CODIGONOBANCO varchar(15) COLLATE Latin1_General_CI_AI NULL,
	DATAVENCIMENTOCONTRATO date NULL,
	QTDEDIASRESCISAOCONTRATO smallint NULL,
	QTDEMESESRECISAOAUTOMATICAINAT smallint NULL,
	VALORLIMITECOBRANCA numeric(14,2) NULL,
	VALORLIMITEMOVIMENTO numeric(14,2) NULL,
	DIASANTECEDENCIARENOVACAOCONVE smallint NULL,
	REALIZACONCILIACAO smallint NULL,
	QTDEDIASRETORNO smallint NULL,
	DIASANTECEDENCIANEGOCIACAO smallint NULL,
	QTDEDIASREPASSECONTRATO smallint NULL,
	QTDEDIASREPASSEPRATICA smallint NULL,
	PERCENTUALLIMITEENVIOEMAIL numeric(8,6) NULL,
	FORMARENOVACAOCONVENIOID smallint NULL,
	CODIGOCARTEIRA varchar(10) COLLATE Latin1_General_CI_AI NULL,
	NOMECARTEIRA varchar(100) COLLATE Latin1_General_CI_AI NULL,
	NOMECEDENTE varchar(100) COLLATE Latin1_General_CI_AI NULL,
	DEDUZIOF numeric(1,0) DEFAULT 0 NOT NULL,
	DEDUZIOFREPASSE numeric(1,0) DEFAULT 0 NOT NULL,
	IDENTIFICACAONOMEARQUIVO varchar(10) COLLATE Latin1_General_CI_AI NULL,
	SOLICITAAUTORIZACAOPARADEBITO numeric(1,0) DEFAULT 0 NULL,
	QTDDIAAGUARDANDOAUTORIZACAODEBITO smallint NULL,
	LIMITEQTDDIACOBRANCASEMDEBITO smallint NULL,
	CONSTRAINT PK_CONVENIOBANCARIO PRIMARY KEY (CONVENIOID)
) GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOBANCARIO_CEDENTE ON dbo.CONVENIOBANCARIO (  CEDENTE_PESSOAID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOBANCARIO_CONTAARRECADACAO ON dbo.CONVENIOBANCARIO (  CONTAARRECADACAOID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOBANCARIO_FORMARENOVACAOCONVENIO ON dbo.CONVENIOBANCARIO (  FORMARENOVACAOCONVENIOID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOBANCARIO_STATUSCONVENIO ON dbo.CONVENIOBANCARIO (  STATUSCONVENIOID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOBANCARIO_TIPOREPASSE ON dbo.CONVENIOBANCARIO (  TIPOREPASSEID ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIOBANCA_TIPOPERIODICI ON dbo.CONVENIOBANCARIO (  PERIODICIDADEGERACAO_PERIODICI ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIO_TIPOQTDE_REPCONTR ON dbo.CONVENIOBANCARIO (  TIPOQTDEDIASREPASSECONTRATO_TI ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIO_TIPOQTDE_REPPRAT ON dbo.CONVENIOBANCARIO (  TIPOQTDEDIASREPASSEPRATICA_TIP ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO
 CREATE NONCLUSTERED INDEX IX_FK_CONVENIO_TIPOQTDE_RETORNO ON dbo.CONVENIOBANCARIO (  TIPOQTDEDIASRETORNO_TIPOQTDEDI ASC  )  
	 WITH (  PAD_INDEX = OFF ,FILLFACTOR = 100  ,SORT_IN_TEMPDB = OFF , IGNORE_DUP_KEY = OFF , STATISTICS_NORECOMPUTE = OFF , ONLINE = OFF , ALLOW_ROW_LOCKS = ON , ALLOW_PAGE_LOCKS = ON  )
	 ON [PRIMARY ]  GO;


-- ESIM.dbo.CONVENIOBANCARIO foreign keys

ALTER TABLE ESIM.dbo.CONVENIOBANCARIO ADD CONSTRAINT FK_CONVENIOBANCARIO_CEDENTE FOREIGN KEY (CEDENTE_PESSOAID) REFERENCES ESIM.dbo.CEDENTE(PESSOAID) GO
ALTER TABLE ESIM.dbo.CONVENIOBANCARIO ADD CONSTRAINT FK_CONVENIOBANCARIO_CONTAARRECADACAO FOREIGN KEY (CONTAARRECADACAOID) REFERENCES ESIM.dbo.CONTAARRECADACAO(CONTAARRECADACAOID) GO
ALTER TABLE ESIM.dbo.CONVENIOBANCARIO ADD CONSTRAINT FK_CONVENIOBANCARIO_FORMARENOVACAOCONVENIO FOREIGN KEY (FORMARENOVACAOCONVENIOID) REFERENCES ESIM.dbo.FORMARENOVACAOCONVENIO(FORMARENOVACAOCONVENIOLID) GO
ALTER TABLE ESIM.dbo.CONVENIOBANCARIO ADD CONSTRAINT FK_CONVENIOBANCARIO_STATUSCONVENIO FOREIGN KEY (STATUSCONVENIOID) REFERENCES ESIM.dbo.STATUSCONVENIO(STATUSCONVENIOID) GO
ALTER TABLE ESIM.dbo.CONVENIOBANCARIO ADD CONSTRAINT FK_CONVENIOBANCARIO_TIPOREPASSE FOREIGN KEY (TIPOREPASSEID) REFERENCES ESIM.dbo.TIPOREPASSE(TIPOREPASSEID) GO
ALTER TABLE ESIM.dbo.CONVENIOBANCARIO ADD CONSTRAINT FK_CONVENIOBANCA_TIPOPERIODICI FOREIGN KEY (PERIODICIDADEGERACAO_PERIODICI) REFERENCES ESIM.dbo.TIPOPERIODICIDADE(PERIODICIDADEID) GO
ALTER TABLE ESIM.dbo.CONVENIOBANCARIO ADD CONSTRAINT FK_CONVENIOB_CONVENIO FOREIGN KEY (CONVENIOID) REFERENCES ESIM.dbo.CONVENIO(CONVENIOID) GO
ALTER TABLE ESIM.dbo.CONVENIOBANCARIO ADD CONSTRAINT FK_CONVENIO_TIPOQTDE_REPCONTR FOREIGN KEY (TIPOQTDEDIASREPASSECONTRATO_TI) REFERENCES ESIM.dbo.TIPOQTDEDIAS(TIPOQTDEDIASID) GO
ALTER TABLE ESIM.dbo.CONVENIOBANCARIO ADD CONSTRAINT FK_CONVENIO_TIPOQTDE_REPPRAT FOREIGN KEY (TIPOQTDEDIASREPASSEPRATICA_TIP) REFERENCES ESIM.dbo.TIPOQTDEDIAS(TIPOQTDEDIASID) GO
ALTER TABLE ESIM.dbo.CONVENIOBANCARIO ADD CONSTRAINT FK_CONVENIO_TIPOQTDE_RETORNO FOREIGN KEY (TIPOQTDEDIASRETORNO_TIPOQTDEDI) REFERENCES ESIM.dbo.TIPOQTDEDIAS(TIPOQTDEDIASID) GO;