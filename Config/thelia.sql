
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- RecommandationTransceiverAntenna
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `RecommandationTransceiverAntenna`;

CREATE TABLE `RecommandationTransceiverAntenna`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `transceiver_id` INTEGER NOT NULL,
    `antenna_id` INTEGER NOT NULL,
    `recommandation_id` INTEGER NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    INDEX `idx_RecommandationTransceiverAntenna_transceiver_id` (`transceiver_id`),
    INDEX `idx_RecommandationTransceiverAntenna_antenna_id` (`antenna_id`),
    INDEX `idx_RecommandationTransceiverAntenna_recommandation_id` (`recommandation_id`),
    CONSTRAINT `fk_RecommandationTransceiverAntenna_transceiver_id`
        FOREIGN KEY (`transceiver_id`)
        REFERENCES `product` (`id`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE,
    CONSTRAINT `fk_RecommandationTransceiverAntenna_antenna_id`
        FOREIGN KEY (`antenna_id`)
        REFERENCES `product` (`id`)
        ON UPDATE RESTRICT
        ON DELETE CASCADE,
    CONSTRAINT `fk_RecommandationTransceiverAntenna_recommandation_id`
        FOREIGN KEY (`recommandation_id`)
        REFERENCES `RecommandationTransceiverAntenna_recommandation` (`id`)
        ON UPDATE RESTRICT
        ON DELETE RESTRICT
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- RecommandationTransceiverAntenna_recommandation
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `RecommandationTransceiverAntenna_recommandation`;

CREATE TABLE `RecommandationTransceiverAntenna_recommandation`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `code` VARCHAR(50) NOT NULL,
    `created_at` DATETIME,
    `updated_at` DATETIME,
    PRIMARY KEY (`id`),
    UNIQUE INDEX `code_UNIQUE` (`code`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- RecommandationTransceiverAntenna_recommandation_i18n
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `RecommandationTransceiverAntenna_recommandation_i18n`;

CREATE TABLE `RecommandationTransceiverAntenna_recommandation_i18n`
(
    `id` INTEGER NOT NULL,
    `locale` VARCHAR(5) DEFAULT 'en_US' NOT NULL,
    `title` VARCHAR(255),
    `description` LONGTEXT,
    `chapo` TEXT,
    `postscriptum` TEXT,
    PRIMARY KEY (`id`,`locale`),
    CONSTRAINT `RecommandationTransceiverAntenna_recommandation_i18n_FK_1`
        FOREIGN KEY (`id`)
        REFERENCES `RecommandationTransceiverAntenna_recommandation` (`id`)
        ON DELETE CASCADE
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- INSERT INTO RecommandationTransceiverAntenna_recommandation & i18n
-- ---------------------------------------------------------------------

INSERT INTO `RecommandationTransceiverAntenna_recommandation` (`id`, `code`, `created_at`, `updated_at`) VALUES
(1, 'excellent', NOW(), NOW()),
(2, 'very ggod', NOW(), NOW()),
(3, 'correct', NOW(), NOW()),
(4, 'not recommended', NOW(), NOW());

INSERT INTO `RecommandationTransceiverAntenna_recommandation_i18n` (`id`, `locale`, `title`, `description`, `chapo`, `postscriptum`) VALUES
(1, 'en_US', 'Excellent', '', '', ''),
(1, 'fr_FR', 'Excellent', '', '', ''),
(2, 'en_US', 'Very Good', '', '', ''),
(2, 'fr_FR', 'Trés bon', '', '', ''),
(3, 'en_US', 'Correct', '', '', ''),
(3, 'fr_FR', 'Correct', '', '', ''),
(4, 'en_US', 'Not Recommended', '', '', ''),
(4, 'fr_FR', 'Non recommandée', '', '', '');

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
