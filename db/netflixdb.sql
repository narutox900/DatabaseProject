CREATE TABLE actor (
	actor_id varchar(10) PRIMARY KEY ,
	actor_name varchar(50)
);

CREATE TABLE director(
	director_id varchar(10) PRIMARY KEY,
	director_name varchar(50)
);

CREATE TABLE genre(
	genre_id varchar(5) PRIMARY KEY,
	genre_name varchar(20)
);

CREATE TABLE movie(
	movie_id varchar(15) PRIMARY KEY,
	title varchar(50),
	type boolean,
	language character(2),
	year int,
	rating real,
	length int,
	isAdult boolean,
	description varchar(200)
);

CREATE TABLE movie_actor(
	movie_id varchar(15),
	actor_id varchar(10),
	PRIMARY KEY (movie_id,actor_id),
	FOREIGN KEY (movie_id) REFERENCES movie(movie_id),
	FOREIGN KEY (actor_id) REFERENCES actor(actor_id)
)

CREATE TABLE movie_director(
	movie_id varchar(15),
	director_id varchar(10),
	PRIMARY KEY (movie_id,director_id),
	FOREIGN KEY (movie_id) REFERENCES movie(movie_id),
	FOREIGN KEY (director_id) REFERENCES director(director_id)
)

CREATE TABLE movie_genre(
	movie_id varchar(15),
	genre_id varchar(5),
	PRIMARY KEY (movie_id,genre_id),
	FOREIGN KEY (movie_id) REFERENCES movie(movie_id),
	FOREIGN KEY (genre_id) REFERENCES genre(genre_id)
)
