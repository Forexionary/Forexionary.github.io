DELIMITER //

CREATE PROCEDURE signup(IN user_email VARCHAR(255), IN user_first_name VARCHAR(255), IN user_last_name VARCHAR(255), IN user_password VARCHAR(255))
BEGIN
    DECLARE hashed_password VARCHAR(255);
    
    -- Validate password strength
    IF LENGTH(user_password) < 8 THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Password must be at least 8 characters in length.';
    ELSE
        -- Hash the password using bcrypt
        SET hashed_password = PASSWORD(user_password);
        
        -- Check for an existing user with the same email
        IF EXISTS (SELECT 1 FROM users WHERE email = user_email) THEN
            SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'A user with this email already exists.';
        ELSE
            -- Insert the new user using a prepared statement
            INSERT INTO users (email, first_name, last_name, password_hash) VALUES (user_email, user_first_name, user_last_name, hashed_password);
        END IF;
    END IF;
END //

DELIMITER ;
