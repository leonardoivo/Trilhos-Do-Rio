-- ESIM.dbo.HISTORICOCOBRANCA definition

-- Drop table

-- DROP TABLE ESIM.dbo.HISTORICOCOBRANCA GO

CREATE TABLE ESIM.dbo.HISTORICOCOBRANCA (
	HISTORICOCOBRANCAID bigint IDENTITY(1,1) NOT NULL,
	CONSTRAINT PK_HISTORICOCOBRANCA PRIMARY KEY (HISTORICOCOBRANCAID)
) GO;