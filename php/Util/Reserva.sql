-- Borrar la base de datos.
DROP DATABASE intranet;

-- Crear la base de datos.
CREATE DATABASE IF NOT EXISTS intranet
    DEFAULT CHARACTER
    SET utf8 COLLATE utf8_spanish_ci;

-- Cargar la base de datos.
USE intranet;

-- availability
DROP TABLE IF EXISTS intranet.availability;

CREATE TABLE availability (
    availability_id int(10) NOT NULL,
    isactive varchar(1) NOT NULL DEFAULT 'Y',
    created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    space varchar(250) NOT NULL,
    days int(10) NOT NULL,
    moth varchar(50) NOT NULL,
    yeart varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE intranet.availability
    ADD CONSTRAINT availability_pkey PRIMARY KEY(availability_id)
        USING BTREE,
    MODIFY availability_id int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;


-- reservation
DROP TABLE IF EXISTS intranet.reservation;

CREATE TABLE reservation (
    reservation_id int(10) NOT NULL,
    isactive varchar(1) NOT NULL DEFAULT 'Y',
    created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
    cince varchar(50)NOT NULL,
    until varchar(50) NOT NULL,
    user varchar(250) NOT NULL,
    isreserved varchar(1) NOT NULL DEFAULT 'N',
    availability_id int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

ALTER TABLE intranet.reservation
    ADD CONSTRAINT reservation_pkey PRIMARY KEY(reservation_id)
        USING BTREE,
    ADD CONSTRAINT reservation_availability_fkey FOREIGN KEY(availability_id)
        REFERENCES availability(availability_id)
        ON UPDATE NO ACTION
        ON DELETE NO ACTION,
    MODIFY reservation_id int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=0;

-- crear el trigger
DELIMITER |

CREATE TRIGGER create_reservations AFTER INSERT ON availability 
  FOR EACH ROW BEGIN
    INSERT INTO reservation(reservation_id,isactive,created,updated,cince,until,user,isreserved,availability_id) VALUES
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'8:00 am','9:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'9:00 am','10:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'10:00 am','11:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'11:00 am','12:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'12:00 am','1:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'1:00 am','2:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'2:00 am','3:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'3:00 am','4:00 am','-',DEFAULT,NEW.availability_id),
    (DEFAULT,DEFAULT,DEFAULT,DEFAULT,'4:00 am','5:00 am','-',DEFAULT,NEW.availability_id);
  END