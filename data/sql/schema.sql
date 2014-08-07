CREATE TABLE fridge (id BIGINT AUTO_INCREMENT, name text, brand VARCHAR(255), capacity INT, PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE fridge_item (id BIGINT AUTO_INCREMENT, name text, amount INT, unit VARCHAR(255), useby DATETIME, idfridge BIGINT, INDEX idfridge_idx (idfridge), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE ingredient (id BIGINT AUTO_INCREMENT, name text, amount INT, unit VARCHAR(255), idrecipe BIGINT, INDEX idrecipe_idx (idrecipe), PRIMARY KEY(id)) ENGINE = INNODB;
CREATE TABLE recipe (id BIGINT AUTO_INCREMENT, name text, preptime INT, cooktime INT, readytime INT, directions text, PRIMARY KEY(id)) ENGINE = INNODB;
ALTER TABLE fridge_item ADD CONSTRAINT fridge_item_idfridge_fridge_id FOREIGN KEY (idfridge) REFERENCES fridge(id);
ALTER TABLE ingredient ADD CONSTRAINT ingredient_idrecipe_recipe_id FOREIGN KEY (idrecipe) REFERENCES recipe(id) ON DELETE CASCADE;
