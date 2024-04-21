CREATE TABLE cards (
    id INT AUTO_INCREMENT PRIMARY KEY,
    img VARCHAR(255),
    card_title VARCHAR(255),
    card_text TEXT
);

INSERT INTO `cards` (`img`, `card_title`,`card_text`) VALUES ('https://images.fineartamerica.com/images-medium-large-5/sailboat-at-sunset-thepalmer.jpg', 'Guided Excursions', 'description')

INSERT INTO `cards` (`img`, `card_title`,`card_text`) VALUES ('https://www.daysailer.org/resources/2016%20NAC%20vertical/2977%20Brian%20Wilson.jpg', 'Rent a Sailboat','description')

INSERT INTO `cards` (`img`, `card_title`,`card_text`) VALUES ('https://s3-media0.fl.yelpcdn.com/bphoto/YdqtdoumvRNdbRAHrwZ7HQ/o.jpg', 'Private Lessons', 'description')



CREATE TABLE contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    phone VARCHAR(20),
    description TEXT
);


CREATE TABLE reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT NOT NULL
);
INSERT INTO reviews (name, description) VALUES ('anonymous', 'An amazing sailing experience! Highly recommended.');

INSERT INTO reviews (name, description) VALUES ('Nathan', 'Pinecone does not like the water, 0/10');
