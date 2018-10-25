--Create tables
CREATE TYPE enum_event_type AS ENUM('connections','competitions','remoteEvent');
CREATE TYPE enum_privilege_type AS ENUM('administrator', 'volunteer', 'managementTeam', 'regionDirector', 'regionSupport', 'eventHost', 'eventSupport','sponsorshipDirector','sponsorContact','chiefJudge','competitionDirector','captain','teamMember');

CREATE TABLE account(
	account_id					SERIAL,
	privilege 					enum_privilege_type,
	email_address 				CHAR(50),
	password 					VARCHAR(200),
	name 						VARCHAR(60),
	preferred_name 				VARCHAR(30),
	profile_picture 			CHAR(30),
	social_media_handle 		CHAR(20),
	hear_from 					CHAR(20), 		
	dietary_requirement 		CHAR(20),
	communication_preference 	CHAR(20),
	tshirt_size 				CHAR(10),
	bank_detail 				CHAR(30),
	full_legal_name 			CHAR(50),
	departure_airport 			CHAR(50),
	flight_preference 			CHAR(20),
	room_share_preference 		CHAR(20),
	team_id 					INTEGER,
	
	CONSTRAINT pk_account PRIMARY KEY (account_id),
	CONSTRAINT uk_account_email_address UNIQUE (email_address),
	CONSTRAINT nn_account_email_address CHECK (email_address IS NOT NULL),
	CONSTRAINT nn_account_name CHECK (name IS NOT NULL),
	CONSTRAINT nn_account_password CHECK (password IS NOT NULL)
	);
	
CREATE TABLE project (
	project_id 					SERIAL,	
	title 						VARCHAR(50),
	thumbnail_image 			VARCHAR(30),
	hight_resolution_image 		VARCHAR(30),
	description 				VARCHAR(200),
	data_story 					VARCHAR(200),
	source_code_url 			VARCHAR(100),
	video_url 					VARCHAR(100),
	homepage_url 				VARCHAR(100),
	team_id 					INTEGER,
	event_location_id 			INTEGER,
	
	CONSTRAINT pk_project PRIMARY KEY (project_id),
	CONSTRAINT uk_project_title UNIQUE (title),
	CONSTRAINT nn_project_title CHECK (title IS NOT NULL)
	);
	
CREATE TABLE update_project(
	update_id					INTEGER,
	project_id 					INTEGER,
	account_id 					INTEGER,
	edit_time					TIMESTAMP,
	
	CONSTRAINT pk_update_project PRIMARY KEY (update_id),
	CONSTRAINT uk_update_project_project_id_account_id UNIQUE (project_id, account_id),
	CONSTRAINT nn_update_project_project_id CHECK (project_id IS NOT NULL),
	CONSTRAINT nn_update_project_account_id CHECK (account_id IS NOT NULL)
	);
	
CREATE TABLE project_dataset(
	project_dataset_id			SERIAL,
	project_id 					INTEGER,
	dataset_id 					INTEGER,

	CONSTRAINT pk_project_dataset PRIMARY KEY (project_dataset_id),
	CONSTRAINT uk_project_dataset_project_id_dataset_id UNIQUE (project_id, dataset_id),
	CONSTRAINT nn_project_dataset_project_id CHECK (project_id IS NOT NULL),
	CONSTRAINT nn_project_dataset_dataset_id CHECK (dataset_id IS NOT NULL)
	);
	
CREATE TABLE project_challenge(
	project_challenge_id		INTEGER,
	project_id 					INTEGER,
	challenge_id 				INTEGER,
	justification 				VARCHAR(300),
	
	CONSTRAINT pk_project_challenge PRIMARY KEY(project_challenge_id),
	CONSTRAINT uk_project_challenge_project_id_challenge_id UNIQUE (project_id, challenge_id),
	CONSTRAINT nn_project_challenge_project_id CHECK (project_id IS NOT NULL),
	CONSTRAINT nn_project_challenge_challenge_id CHECK (challenge_id IS NOT NULL)
	);
	
CREATE TABLE team (
	team_id 					SERIAL,
	name 						VARCHAR(30),
	captain 					INTEGER,
	
	CONSTRAINT pk_team PRIMARY KEY (team_id),
	CONSTRAINT uk_team_id UNIQUE (team_id),
	CONSTRAINT uk_captain UNIQUE (captain),
	CONSTRAINT nn_team_id CHECK (team_id IS NOT NULL),
	CONSTRAINT nn_captain CHECK (captain IS NOT NULL)
	);

CREATE TABLE region (
	region_id 					SERIAL,
	name 						CHAR(30),
	parent_region 				INTEGER,
	region_director 			INTEGER,
	timezone_offset 			SMALLINT,	
	CONSTRAINT pk_region PRIMARY KEY (region_id),
	
	CONSTRAINT uk_region_name UNIQUE (name),
	CONSTRAINT nn_table_name CHECK (name IS NOT NULL),
	CONSTRAINT nn_timezone_offset CHECK ( timezone_offset IS NOT NULL)
	);
	
CREATE TABLE region_support (
	region_support_id 			SERIAL,
	region_id 					INTEGER,
	support_id 					INTEGER,
	CONSTRAINT pk_region_support PRIMARY KEY (region_support_id),
	
	CONSTRAINT uk_region_support_region_id_support_id UNIQUE (region_id, support_id),
	CONSTRAINT nn_region_support_region_id CHECK (region_id IS NOT NULL),
	CONSTRAINT nn_region_support_support_id CHECK ( support_id IS NOT NULL)
	);

CREATE TABLE event_location(
	event_location_id 				SERIAL,	
	name 							VARCHAR(100),
	event_host 						INTEGER,
	event_support 					INTEGER,	
	email_address 					VARCHAR(50),
	twitter_account 				VARCHAR(30),
	twitter_name 					VARCHAR(30),
	address 						VARCHAR(100),
	accessibility_information 		VARCHAR(100),
	youth_support_information 		VARCHAR(100),
	capacity 						INTEGER,
	parking_information 			VARCHAR(100),
	public_transfer_information 	VARCHAR(100),
	hours_of_operation_information 	INTEGER,
	catering_information 			VARCHAR(100),
	latitude 						REAL,
	longitude 						REAL,
	
	CONSTRAINT pk_event_location PRIMARY KEY (event_location_id),
	CONSTRAINT uk_name UNIQUE (name),
	CONSTRAINT nn_name CHECK (name IS NOT NULL)
	);

CREATE TABLE event_support (
	event_support_id 			SERIAL,
	event_id 					INTEGER,
	support_id 					INTEGER,
	CONSTRAINT pk_event_support PRIMARY KEY (event_support_id),
	
	CONSTRAINT uk_event_support_region_id_support_id UNIQUE (event_id, support_id),
	CONSTRAINT nn_event_support_event_id CHECK (event_id IS NOT NULL),
	CONSTRAINT nn_event_support_support_id CHECK ( support_id IS NOT NULL)
	);
	
CREATE TABLE challenge(
	challenge_id 						SERIAL,
	name 								CHAR(30),
	region 								INTEGER,
	short_description 					VARCHAR(200),
	long_description 					VARCHAR(200),
	image_url 							CHAR(50),
	video_url 							CHAR(50),
	dataset_field_url 					CHAR(50),
	eligibility_criteria_description 	VARCHAR(200),
	competition 						INTEGER,
	
	CONSTRAINT pk_challenge PRIMARY KEY (challenge_id),
	CONSTRAINT uk_table_name UNIQUE (name),
	CONSTRAINT nn_table_name CHECK (name IS NOT NULL)
	);

CREATE TABLE challenge_sponsor (
	challenge_sponsor_id				SERIAL,
	challenge_id						INTEGER,
	sponsor_id 							INTEGER,

	CONSTRAINT pk_challenge_sponsor PRIMARY KEY (challenge_sponsor_id),
	CONSTRAINT uk_challenge_sponsor_challenge_id_sponsor_id UNIQUE (challenge_id, sponsor_id),
	CONSTRAINT nn_challenge_sponsor_challenge_id CHECK (challenge_id IS NOT NULL),
	CONSTRAINT nn_challenge_sponsor_sponsor_id CHECK (sponsor_id IS NOT NULL)
	);

CREATE TABLE challenge_judge(
	challenge_judge_id				SERIAL,
	challenge_id 					INTEGER,
	judge_id 						INTEGER,
	is_judge 						BOOL,
	
	CONSTRAINT pk_challenge_judge PRIMARY KEY(challenge_id, judge_id),
	CONSTRAINT uk_challenge_judge_challenge_id_judge_id UNIQUE (challenge_id, judge_id),
	CONSTRAINT nn_challenge_judge_challenge_id CHECK (challenge_id IS NOT NULL),
	CONSTRAINT nn_challenge_judge_judge_id CHECK (judge_id IS NOT NULL),
	CONSTRAINT nn_challenge_judge_is_judge CHECK (is_judge IS NOT NULL)
	);

CREATE TABLE dataset (
	dataset_id 						SERIAL,
	dataset_url 					VARCHAR(30),
	description 					VARCHAR(200),
	region_id 						INTEGER,
	CONSTRAINT pk_dataset PRIMARY KEY(dataset_id)
	);


CREATE TABLE state_event (
	state_event_id					SERIAL,
	event_location_id 				INTEGER,
	registration_setting 			CHAR(20),
	event_date						TIMESTAMPTZ,
	type                            enum_event_type,
	
	CONSTRAINT pk_state_event PRIMARY KEY(state_event_id),
	CONSTRAINT uk_state_event_event_location_id UNIQUE (event_location_id),
	CONSTRAINT nn_state_event_event_location_id CHECK ( event_location_id IS NOT NULL)
	);

CREATE TABLE national_event (
	national_event_id				SERIAL,
	event_location_id 				INTEGER,
	registration_setting 			CHAR(20),
	event_date						TIMESTAMPTZ,
	flight_option_to 				VARCHAR(100),
	flight_option_from 				VARCHAR(100),
	type                            enum_event_type,
	
	CONSTRAINT pk_national_event PRIMARY KEY(national_event_id),
	CONSTRAINT uk_national_event_event_location_id UNIQUE (event_location_id),
	CONSTRAINT nn_national_event_event_location_id CHECK ( event_location_id IS NOT NULL)
	);
	
CREATE TABLE criteria(
	criteria_id 					SERIAL,
	name 							CHAR(30),
	criteria 						VARCHAR(200),
	
	CONSTRAINT pk_criteria PRIMARY KEY(criteria_id),
	CONSTRAINT uk_criteria_name UNIQUE (name),
	CONSTRAINT nn_criteria_name CHECK (name IS NOT NULL),
	CONSTRAINT nn_criteria_criteria CHECK ( criteria IS NOT NULL)
	);

CREATE TABLE project_judge(
	project_judge_id				SERIAL,
	project_id 						INTEGER,
	criteria_id 					INTEGER,
	eligible 						BOOL,  
	score 							SMALLINT,
	
	CONSTRAINT pk_project_judge PRIMARY KEY(project_judge_id),
	CONSTRAINT uk_project_judge_project_id_criteria_id UNIQUE (project_id, criteria_id),
	CONSTRAINT nn_project_judge_project_id CHECK ( project_id IS NOT NULL),
	CONSTRAINT nn_project_judge_criteria_id CHECK ( criteria_id IS NOT NULL)
	);

CREATE TABLE competition(
	competition_id 					SERIAL,
	name 							CHAR(30),
	event_location_id 				INTEGER,
	director_id						INTEGER,
	starting 						TIMESTAMP,
	ending 							TIMESTAMP,
	first 							TIMESTAMP,
	second 							TIMESTAMP,
	third 							TIMESTAMP,
	fourth 							TIMESTAMP,
	fifth 							TIMESTAMP,
	
	CONSTRAINT pk_competition PRIMARY KEY(competition_id),
	CONSTRAINT uk_competition_name UNIQUE (name),
	CONSTRAINT uk_competition_director_id UNIQUE (director_id),
	CONSTRAINT nn_competition_starting CHECK ( starting IS NOT NULL),
	CONSTRAINT nn_competition_ending CHECK ( ending IS NOT NULL),
	CONSTRAINT nn_competition_first CHECK ( first IS NOT NULL),
	CONSTRAINT nn_competition_second CHECK ( second IS NOT NULL),
	CONSTRAINT nn_competition_third CHECK ( third IS NOT NULL),
	CONSTRAINT nn_competition_fourth CHECK ( fourth IS NOT NULL),
	CONSTRAINT nn_competition_fifth CHECK ( fifth IS NOT NULL)
	);



CREATE TABLE sponsor(
	sponsor_id					SERIAL, 
	name						VARCHAR(50), 
	logo						VARCHAR(50), 
	description					VARCHAR(200),
	url							VARCHAR(100),
	
	CONSTRAINT pk_sponsor PRIMARY KEY(sponsor_id),
	CONSTRAINT uk_sponsor_name UNIQUE (name),
	CONSTRAINT nn_sponsor_name CHECK (name IS NOT NULL)
	);

CREATE TABLE sponsor_contact(
	sponsor_contact_id			SERIAL,  
	sponsor_id					INTEGER, 
	contact_id					INTEGER,
	
	CONSTRAINT pk_sponsor_contact PRIMARY KEY(sponsor_contact_id),
	CONSTRAINT uk_sponsor_contact_sponsor_id UNIQUE (sponsor_id),
	CONSTRAINT nn_sponsor_contact_sponsor_id CHECK (sponsor_id IS NOT NULL),
	CONSTRAINT nn_sponsor_contact_contact_id CHECK (contact_id IS NOT NULL)
	);	
	
	
	
--Add foreign key constraints

ALTER TABLE account 
	ADD CONSTRAINT fk_account_team_id 
	FOREIGN KEY (team_id) REFERENCES team (team_id)
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE project 
	ADD CONSTRAINT fk_project_team_id 
	FOREIGN KEY (team_id) REFERENCES team (team_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_project_event_location_id 
	FOREIGN KEY (event_location_id) REFERENCES event_location (event_location_id) MATCH SIMPLE
    ON UPDATE NO ACTION ON DELETE NO ACTION;
	
ALTER TABLE update_project 
	ADD CONSTRAINT fk_update_project_id 
	FOREIGN KEY (project_id)REFERENCES project (project_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_update_account_id 
	FOREIGN KEY (account_id) REFERENCES account (account_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE project_dataset 
	ADD CONSTRAINT fk_project_dataset_project_id 
	FOREIGN KEY (project_id) REFERENCES project (project_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,

	ADD  CONSTRAINT fk_project_dataset_dataset_id 
	FOREIGN KEY (dataset_id) REFERENCES dataset (dataset_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE project_challenge 
	ADD CONSTRAINT fk_project_challenge_project_id 
	FOREIGN KEY (project_id) REFERENCES project (project_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_project_challenge_challenge_id 
	FOREIGN KEY (challenge_id) REFERENCES challenge (challenge_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;
	
ALTER TABLE team 
	ADD CONSTRAINT fk_team_captain 
	FOREIGN KEY (captain) REFERENCES account (account_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;
	
ALTER TABLE region 
	ADD CONSTRAINT fk_region_parent_region 
	FOREIGN KEY (parent_region) REFERENCES region (region_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_region_region_director 
	FOREIGN KEY (region_director) REFERENCES account (account_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE region_support 
	ADD CONSTRAINT fk_region_support_region_id 
	FOREIGN KEY (region_id) REFERENCES region (region_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_region_support_support_id 
	FOREIGN KEY (support_id) REFERENCES account (account_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;
	
ALTER TABLE event_location 
	ADD CONSTRAINT fk_event_location_event_host 
	FOREIGN KEY (event_host) REFERENCES account (account_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE event_support 
	ADD CONSTRAINT fk_event_support_event_id 
	FOREIGN KEY (event_id) REFERENCES event_location (event_location_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_event_support_support_id 
	FOREIGN KEY (support_id) REFERENCES account (account_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;
	
ALTER TABLE challenge 
	ADD CONSTRAINT fk_challenge_region 
	FOREIGN KEY (region) REFERENCES region (region_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_challenge_competition 
	FOREIGN KEY (competition)REFERENCES competition (competition_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE challenge_sponsor 
	ADD CONSTRAINT challenge_sponsor_challenge_id_fkey 
	FOREIGN KEY (challenge_id) REFERENCES challenge (challenge_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT challenge_sponsor_sponsor_id_fkey 
	FOREIGN KEY (sponsor_id) REFERENCES sponsor (sponsor_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;
	
ALTER TABLE challenge_judge 
	ADD CONSTRAINT fk_challenge_judge_challenge_id 
	FOREIGN KEY (challenge_id) REFERENCES challenge (challenge_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_challenge_judge_judge_id 
	FOREIGN KEY (judge_id) REFERENCES account (account_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE dataset 
	ADD CONSTRAINT fk_dataset_region_id 
	FOREIGN KEY (region_id) REFERENCES region (region_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE state_event 
	ADD CONSTRAINT fk_state_event_event_location_id 
	FOREIGN KEY (event_location_id) REFERENCES event_location (event_location_id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE national_event 
	ADD CONSTRAINT fk_national_event_event_location_id 
	FOREIGN KEY (event_location_id) REFERENCES event_location (event_location_id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;
	
ALTER TABLE project_judge 
	ADD CONSTRAINT fk_project_judge_project_id 
	FOREIGN KEY (project_id) REFERENCES project (project_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_project_judge_criteria_id 
	FOREIGN KEY (criteria_id) REFERENCES criteria (criteria_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;
	
ALTER TABLE competition 
	ADD CONSTRAINT fk_competition_event_location_id 
	FOREIGN KEY (event_location_id) REFERENCES event_location (event_location_id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_competition_director_id 
	FOREIGN KEY (director_id) REFERENCES account (account_id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE sponsor_contact 
	ADD CONSTRAINT fk_sponsor_contact_sponsor_id 
	FOREIGN KEY (sponsor_id) REFERENCES sponsor (sponsor_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_sponsor_contact_contact_id 
	FOREIGN KEY (contact_id ) REFERENCES account (account_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;	
	