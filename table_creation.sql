drop TABLE if exists blog_post;
drop TABLE if exists users;

CREATE TABLE users(
	id 		INTEGER PRIMARY KEY AUTOINCREMENT,
	username 	TEXT NOT NULL,
	email 	TEXT NOT NULL UNIQUE,
	pass 	TEXT NOT NULL
);

CREATE TABLE blog_post(
	id 		INTEGER PRIMARY KEY AUTOINCREMENT,
	title	TEXT NOT NULL,
	photo 	TEXT,
	content TEXT NOT NULL,
	created_at TEXT NOT NULL,
	user_id INTEGER NOT NULL,
	FOREIGN KEY(user_id) REFERENCES users(id)
);

COMMIT;