INSERT INTO cargos( nome_cargo, desc_cargo, tipo_cargo) VALUES (,'vice presidente',' vice presidencia',2)
INSERT INTO cargos( nome_cargo, desc_cargo, tipo_cargo) VALUES (,'secretario geral','secretaria geral',3)
INSERT INTO cargos( nome_cargo, desc_cargo, tipo_cargo) VALUES (,'tesoureiro','tesouraria e financas',4)
INSERT INTO cargos( nome_cargo, desc_cargo, tipo_cargo) VALUES (,'conselheiro fiscal','fiscalizacao',5)
INSERT INTO cargos( nome_cargo, desc_cargo, tipo_cargo) VALUES (,'conselheiro fiscal','fiscalizacao',6)
INSERT INTO cargos( nome_cargo, desc_cargo, tipo_cargo) VALUES (,'conselheiro fiscal','fiscalizacao'7)
INSERT INTO cargos( nome_cargo, desc_cargo, tipo_cargo) VALUES (,'conselheiro fiscal','fiscalizacao'8)


INSERT INTO `conselhofiscal`( `Titulo`, `Relatorio`, `id_cargo`, `id_usuario`) VALUES ('','',5,26)
Erro
consulta SQL:

ALTER TABLE  `usuarios` CHANGE  `id_usuario`  `id_usuario` INT( 11 ) NOT NULL AUTO_INCREMENT

Mensagens do MySQL : Documentação

#1833 - Cannot change column 'id_usuario': used in a foreign key constraint 'FK_usuario' of table 'TrilhosDoRio.LogEventos' 
SELECT * 
FROM conselhofiscal csfiscal
INNER JOIN usuarios user ON csfiscal.id_usuario = user.id_usuario
WHERE user.cpf =213233233
LIMIT 0 , 30


select ra.id_reuniao , ra.desc_reuniao, ra.ata_reuniao,ra.local,ra.data_reuniao, user.nome nome , user.sobrenome sobrenome, cg.tipo_cargo tipo_cargo from conselhofiscal ra inner join usuarios user on ra.id_usuarios=user.id_usuario inner join cargos cg on ra.id_cargo=cg.id_cargo

