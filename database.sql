-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema cartorio_web
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema cartorio_web
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `cartorio_web` DEFAULT CHARACTER SET utf8 ;
USE `cartorio_web` ;

-- -----------------------------------------------------
-- Table `cartorio_web`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio_web`.`users` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `cpf` VARCHAR(11) NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `email` VARCHAR(50) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `lembrete` VARCHAR(100) NULL,
  `remember_token` VARCHAR(255) NULL,
  `email_verified_at` DATETIME NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  `deleted_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC),
  UNIQUE INDEX `email_UNIQUE` (`email` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cartorio_web`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio_web`.`perfil` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(30) NOT NULL,
  `identificador` VARCHAR(20) NOT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `identificador_UNIQUE` (`identificador` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cartorio_web`.`user_perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio_web`.`user_perfil` (
  `user_id` INT NOT NULL,
  `perfil_id` INT NOT NULL,
  PRIMARY KEY (`user_id`, `perfil_id`),
  INDEX `fk_users_has_perfil_perfil1_idx` (`perfil_id` ASC),
  INDEX `fk_users_has_perfil_users_idx` (`user_id` ASC),
  CONSTRAINT `fk_users_has_perfil_users`
    FOREIGN KEY (`user_id`)
    REFERENCES `cartorio_web`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_perfil_perfil1`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `cartorio_web`.`perfil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cartorio_web`.`modulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio_web`.`modulo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `icone` VARCHAR(45) NOT NULL,
  `url` VARCHAR(20) NULL,
  `descricao` VARCHAR(200) NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `url_UNIQUE` (`url` ASC))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cartorio_web`.`submodulo`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio_web`.`submodulo` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `modulo_id` INT NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `icone` VARCHAR(45) NOT NULL,
  `url` VARCHAR(20) NOT NULL,
  `menu` TINYINT NOT NULL DEFAULT 1,
  `descricao` VARCHAR(255) NULL,
  `ordem` INT NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_modulos_rotina_principal1_idx` (`modulo_id` ASC),
  UNIQUE INDEX `url_UNIQUE` (`url` ASC),
  CONSTRAINT `fk_modulos_rotina_principal1`
    FOREIGN KEY (`modulo_id`)
    REFERENCES `cartorio_web`.`modulo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cartorio_web`.`operacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio_web`.`operacao` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `submodulo_id` INT NOT NULL,
  `nome` VARCHAR(100) NOT NULL,
  `nome_curto` VARCHAR(50) NOT NULL,
  `url` VARCHAR(20) NOT NULL,
  `icone` VARCHAR(45) NOT NULL,
  `status` TINYINT NOT NULL DEFAULT 0,
  `descricao` VARCHAR(200) NULL,
  `target` ENUM('_blank') NULL,
  `created_at` TIMESTAMP NULL,
  `updated_at` TIMESTAMP NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_funcoes_modulos1_idx` (`submodulo_id` ASC),
  UNIQUE INDEX `url_UNIQUE` (`url` ASC),
  CONSTRAINT `fk_funcoes_modulos1`
    FOREIGN KEY (`submodulo_id`)
    REFERENCES `cartorio_web`.`submodulo` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `cartorio_web`.`perfil_operacao`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `cartorio_web`.`perfil_operacao` (
  `perfil_id` INT NOT NULL,
  `operacao_id` INT NOT NULL,
  PRIMARY KEY (`perfil_id`, `operacao_id`),
  INDEX `fk_funcoes_has_perfis_perfis1_idx` (`perfil_id` ASC),
  INDEX `fk_funcoes_has_perfis_funcoes1_idx` (`operacao_id` ASC),
  CONSTRAINT `fk_funcoes_has_perfis_funcoes1`
    FOREIGN KEY (`operacao_id`)
    REFERENCES `cartorio_web`.`operacao` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_funcoes_has_perfis_perfis1`
    FOREIGN KEY (`perfil_id`)
    REFERENCES `cartorio_web`.`perfil` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `cartorio_web`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `cartorio_web`;
INSERT INTO `cartorio_web`.`users` (`id`, `cpf`, `nome`, `email`, `password`, `lembrete`, `remember_token`, `email_verified_at`, `created_at`, `updated_at`, `deleted_at`) VALUES (1, '00000000000', 'Administrador', 'admin@email.com', '$2y$10$bzj9FkTS/HHwuuoKhVtIgOphjnYRV4ueJDBH0xqAZDA3VtA4PX3PO', NULL, NULL, NULL, '2021-11-10 18:14:34', '2021-11-10 18:14:34', NULL);

COMMIT;


-- -----------------------------------------------------
-- Data for table `cartorio_web`.`perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `cartorio_web`;
INSERT INTO `cartorio_web`.`perfil` (`id`, `nome`, `identificador`, `created_at`, `updated_at`) VALUES (1, 'Root', 'root', '2021-11-10 18:14:34', '2021-11-10 18:14:34');
INSERT INTO `cartorio_web`.`perfil` (`id`, `nome`, `identificador`, `created_at`, `updated_at`) VALUES (2, 'Administrador', 'admin', '2021-11-10 23:42:05', '2021-11-10 23:42:05');

COMMIT;


-- -----------------------------------------------------
-- Data for table `cartorio_web`.`user_perfil`
-- -----------------------------------------------------
START TRANSACTION;
USE `cartorio_web`;
INSERT INTO `cartorio_web`.`user_perfil` (`user_id`, `perfil_id`) VALUES (1, 1);

COMMIT;


-- -----------------------------------------------------
-- Data for table `cartorio_web`.`modulo`
-- -----------------------------------------------------
START TRANSACTION;
USE `cartorio_web`;
INSERT INTO `cartorio_web`.`modulo` (`id`, `nome`, `icone`, `url`, `descricao`, `created_at`, `updated_at`) VALUES (1, 'Segurança', 'fas fa-shield-alt', NULL, 'Modulo responsável pelo controle de acesso', '2021-11-16 14:15:18', '2021-11-16 14:15:18');

COMMIT;


-- -----------------------------------------------------
-- Data for table `cartorio_web`.`submodulo`
-- -----------------------------------------------------
START TRANSACTION;
USE `cartorio_web`;
INSERT INTO `cartorio_web`.`submodulo` (`id`, `modulo_id`, `nome`, `icone`, `url`, `menu`, `descricao`, `ordem`, `created_at`, `updated_at`) VALUES (1, 1, 'Usuários', 'fas fa-users', 'users.index', 1, NULL, NULL, '2021-11-11 19:10:45', '2021-11-13 01:26:38');
INSERT INTO `cartorio_web`.`submodulo` (`id`, `modulo_id`, `nome`, `icone`, `url`, `menu`, `descricao`, `ordem`, `created_at`, `updated_at`) VALUES (2, 1, 'Perfil', 'far fa-address-card', 'perfis.index', 1, NULL, NULL, '2021-11-11 19:19:22', '2021-11-13 01:07:55');
INSERT INTO `cartorio_web`.`submodulo` (`id`, `modulo_id`, `nome`, `icone`, `url`, `menu`, `descricao`, `ordem`, `created_at`, `updated_at`) VALUES (3, 1, 'Módulos', 'far fa-object-group', 'modules.index', 1, NULL, NULL, '2021-11-11 19:19:49', '2021-11-11 19:30:11');
INSERT INTO `cartorio_web`.`submodulo` (`id`, `modulo_id`, `nome`, `icone`, `url`, `menu`, `descricao`, `ordem`, `created_at`, `updated_at`) VALUES (4, 1, 'Submódulos', 'far fa-object-ungroup', 'submodules.index', 1, NULL, NULL, '2021-11-11 19:20:07', '2021-11-11 19:20:07');
INSERT INTO `cartorio_web`.`submodulo` (`id`, `modulo_id`, `nome`, `icone`, `url`, `menu`, `descricao`, `ordem`, `created_at`, `updated_at`) VALUES (5, 1, 'Operações', 'fas fa-tasks', 'operations.index', 0, NULL, NULL, '2021-11-12 23:39:10', '2021-11-13 01:20:36');

COMMIT;


-- -----------------------------------------------------
-- Data for table `cartorio_web`.`operacao`
-- -----------------------------------------------------
START TRANSACTION;
USE `cartorio_web`;
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (1, 1, 'Novo Usuário', 'Novo', 'users.create', 'fas fa-plus-circle', 1, NULL, NULL, '2021-11-12 19:34:15', '2021-11-12 23:23:00');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (2, 1, 'Editar Usuário', 'Editar', 'users.edit', 'far fa-edit', 1, NULL, NULL, '2021-11-12 19:37:26', '2021-11-12 23:23:07');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (3, 1, 'Excluir Usuário', 'Excluir', 'users.destroy', 'far fa-trash-alt', 0, NULL, NULL, '2021-11-12 19:41:26', '2021-11-18 15:52:34');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (4, 2, 'Novo Perfil', 'Novo', 'perfis.create', 'fas fa-plus-circle', 1, NULL, NULL, '2021-11-12 23:21:03', '2021-11-17 16:48:57');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (5, 2, 'Editar Perfil', 'Editar', 'perfis.edit', 'far fa-edit', 1, NULL, NULL, '2021-11-12 23:21:59', '2021-11-17 16:48:41');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (6, 2, 'Excluir Perfil', 'Excluir', 'perfis.destroy', 'far fa-trash-alt', 0, NULL, NULL, '2021-11-12 23:22:41', '2021-11-18 15:52:47');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (7, 2, 'Pesquisar Perfil', 'Pesquisar', 'perfis.index', 'fas fa-search', 1, NULL, NULL, '2021-11-12 23:25:37', '2021-11-17 16:48:54');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (8, 1, 'Pesquisar Usuário', 'Pesquisar', 'users.index', 'fas fa-search', 1, NULL, NULL, '2021-11-12 23:26:18', '2021-11-12 23:26:18');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (9, 3, 'Novo Módulo', 'Novo', 'modules.create', 'fas fa-plus-circle', 1, NULL, NULL, '2021-11-12 23:27:35', '2021-11-12 23:27:35');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (10, 3, 'Editar Módulo', 'Editar', 'modules.edit', 'far fa-edit', 1, NULL, NULL, '2021-11-12 23:28:18', '2021-11-12 23:28:18');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (11, 3, 'Excluir Módulo', 'Excluir', 'modules.destroy', 'far fa-trash-alt', 0, NULL, NULL, '2021-11-12 23:28:52', '2021-11-18 15:52:59');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (12, 3, 'Pesquisar Módulo', 'Pesquisar', 'modules.index', 'fas fa-search', 1, NULL, NULL, '2021-11-12 23:29:30', '2021-11-12 23:29:30');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (13, 4, 'Novo Submódulo', 'Novo', 'submodules.create', 'fas fa-plus-circle', 1, NULL, NULL, '2021-11-12 23:31:59', '2021-11-17 16:49:35');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (14, 4, 'Editar Submódulo', 'Editar', 'submodules.edit', 'far fa-edit', 1, NULL, NULL, '2021-11-12 23:32:45', '2021-11-17 16:49:39');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (15, 4, 'Excluir Submódulo', 'Excluir', 'submodules.destroy', 'far fa-trash-alt', 0, NULL, NULL, '2021-11-12 23:33:51', '2021-11-18 15:53:09');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (16, 4, 'Pesquisar Submódulo', 'Pesquisar', 'submodules.index', 'fas fa-search', 1, NULL, NULL, '2021-11-12 23:34:29', '2021-11-17 16:49:46');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (17, 5, 'Nova Operação', 'Nova', 'operations.create', 'fas fa-plus-circle', 1, NULL, NULL, '2021-11-12 23:41:23', '2021-11-18 14:43:51');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (18, 5, 'Editar Operação', 'Editar', 'operations.edit', 'far fa-edit', 1, NULL, NULL, '2021-11-12 23:42:10', '2021-11-18 14:44:25');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (19, 4, 'Operações', 'Operações', 'submodules.show', 'fas fa-user-edit', 1, NULL, NULL, '2021-11-12 23:44:28', '2021-11-17 16:49:49');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (20, 2, 'Permissões', 'Permissões', 'perfis.show', 'far fa-clipboard', 1, NULL, NULL, '2021-11-12 23:46:11', '2021-11-17 16:48:27');
INSERT INTO `cartorio_web`.`operacao` (`id`, `submodulo_id`, `nome`, `nome_curto`, `url`, `icone`, `status`, `descricao`, `target`, `created_at`, `updated_at`) VALUES (21, 1, 'Visualizar Usuário', 'Perfis', 'users.show', 'fas fa-id-card-alt', 1, NULL, NULL, '2021-11-13 01:09:56', '2021-11-13 01:24:35');

COMMIT;


-- -----------------------------------------------------
-- Data for table `cartorio_web`.`perfil_operacao`
-- -----------------------------------------------------
START TRANSACTION;
USE `cartorio_web`;
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 1);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 2);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 4);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 5);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 7);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 8);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 9);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 10);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 12);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 13);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 14);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 16);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 17);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 18);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 19);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 20);
INSERT INTO `cartorio_web`.`perfil_operacao` (`perfil_id`, `operacao_id`) VALUES (1, 21);

COMMIT;

