CREATE TABLE USER(
	id 		VARCHAR(16) NOT NULL PRIMARY KEY,
	passwd	VARCHAR(100) NOT NULL,
	email	VARCHAR(32) NOT NULL
);

CREATE TABLE PROJECT(
	prj_no 		INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	user_id		VARCHAR(16) NOT NULL,
	prj_name	VARCHAR(32) NOT NULL,
	doxy_path	VARCHAR(64) NOT NULL,
	CONSTRAINT USER_PROJECT FOREIGN KEY (user_id)
	REFERENCES USER(id) ON DELETE CASCADE
);
