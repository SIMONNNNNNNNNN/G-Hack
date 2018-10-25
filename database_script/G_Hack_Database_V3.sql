--Create tables
CREATE TYPE enum_event_type AS ENUM('connections','competitions','remoteEvent');
CREATE TYPE enum_privilege_type AS ENUM('administrator', 'volunteer', 'managementTeam', 'regionDirector', 'regionSupport', 'eventHost', 'eventSupport','sponsorshipDirector','sponsorContact','chiefJudge','competitionDirector','captain','teamMember');
CREATE TYPE enum_region_type AS ENUM('state','national');

CREATE TABLE account(
	account_id					SERIAL,
	privilege 					enum_privilege_type,
	email_address 				VARCHAR(50),
	password 					VARCHAR(200),
	name 						VARCHAR(50),
	preferred_name 				VARCHAR(50),
	profile_picture 			VARCHAR(200),
	facebook					VARCHAR(50),
	twitter						VARCHAR(50),
	linkedin 					VARCHAR(50),
	hear_from 					VARCHAR(30), 		
	dietary_requirement 		VARCHAR(30),
	communication_preference 	VARCHAR(30),
	tshirt_size 				VARCHAR(10),
	bank_detail 				VARCHAR(50),
	full_legal_name 			VARCHAR(50),
	departure_airport 			VARCHAR(50),
	flight_preference 			VARCHAR(30),
	room_share_preference 		VARCHAR(30),
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
	thumbnail_image 			VARCHAR(200),
	high_resolution_image 		VARCHAR(200),
	description 				VARCHAR(1000),
	data_story 					VARCHAR(1000),
	source_code_url 			VARCHAR(200),
	video_url 					VARCHAR(200),
	homepage_url 				VARCHAR(200),
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
	project_challenge_id		SERIAL,
	project_id 					INTEGER,
	challenge_id 				INTEGER,
	justification 				VARCHAR(1000),
	checkpoint					INTEGER,
	is_removed					BOOLEAN,
	
	CONSTRAINT pk_project_challenge PRIMARY KEY(project_challenge_id),
	CONSTRAINT uk_project_challenge_project_id_challenge_id UNIQUE ( project_id, challenge_id),
	CONSTRAINT nn_project_challenge_project_id CHECK (project_id IS NOT NULL),
	CONSTRAINT nn_project_challenge_challenge_id CHECK (challenge_id IS NOT NULL)
	);
	
CREATE TABLE team (
	team_id 					SERIAL,
	name 						VARCHAR(50),
	captain 					INTEGER,
	
	CONSTRAINT pk_team PRIMARY KEY (team_id),
	CONSTRAINT uk_team_id UNIQUE (team_id),
	CONSTRAINT uk_captain UNIQUE (captain),
	CONSTRAINT nn_team_id CHECK (team_id IS NOT NULL),
	CONSTRAINT nn_captain CHECK (captain IS NOT NULL)
	);

CREATE TABLE region (
	region_id 					SERIAL,
	name 						VARCHAR(50),
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
	name 							VARCHAR(50),
	event_region 					INTEGER,
	event_host 						INTEGER,
	event_support 					INTEGER,	
	email_address 					VARCHAR(50),
	twitter_account 				VARCHAR(50),
	twitter_name 					VARCHAR(50),
	address 						VARCHAR(1000),
	accessibility_information 		VARCHAR(1000),
	youth_support_information 		VARCHAR(1000),
	capacity 						INTEGER,
	parking_information 			VARCHAR(1000),
	public_transfer_information 	VARCHAR(1000),
	hours_of_operation_information 	VARCHAR(1000),
	catering_information 			VARCHAR(1000),
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
	name 								VARCHAR(50),
	region 								INTEGER,
	short_description 					VARCHAR(300),
	long_description 					VARCHAR(1000),
	image_url 							VARCHAR(200),
	video_url 							VARCHAR(200),
	dataset_field_url 					VARCHAR(200),
	eligibility_criteria_description 	VARCHAR(200),
	
	CONSTRAINT pk_challenge PRIMARY KEY (challenge_id),
	CONSTRAINT uk_challenge UNIQUE (name),
	CONSTRAINT nn_challenge CHECK (name IS NOT NULL)
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
	name							VARCHAR(50),
	dataset_url 					VARCHAR(200),
	description 					VARCHAR(1000),
	region_id 						INTEGER,
	CONSTRAINT pk_dataset PRIMARY KEY(dataset_id)
	);

CREATE TABLE event (
	event_id						SERIAL,
	event_location_id 				INTEGER,
	registration_setting 			VARCHAR(1000),
	event_date						TIMESTAMPTZ,
	flight_option_to 				VARCHAR(1000),
	flight_option_from 				VARCHAR(1000),
	event_type                      enum_event_type,
	region_type						enum_region_type,

	CONSTRAINT pk_event PRIMARY KEY(event_id),
	CONSTRAINT nn_event_event_location_id CHECK (event_location_id IS NOT NULL)
	);
	
CREATE TABLE account_event(
	account_event_id				SERIAL,
    account_id                  	INTEGER,
    event_id              			INTEGER,
    CONSTRAINT pk_account_event PRIMARY KEY (account_event_id),
	CONSTRAINT uk_account_event_account_id_event_id UNIQUE (account_id, event_id),
    CONSTRAINT nn_account_event_account_id CHECK (account_id IS NOT NULL),
    CONSTRAINT nn_account_event_event_id CHECK (event_id IS NOT NULL)
	);
	
CREATE TABLE criteria(
	criteria_id 					SERIAL,
	name 							VARCHAR(50),
	criteria 						VARCHAR(1000),
	
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
	event_id						INTEGER,
	name 							VARCHAR(50),
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
	CONSTRAINT nn_competition_event_id CHECK ( event_id IS NOT NULL),
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
	logo						VARCHAR(200), 
	description					VARCHAR(1000),
	url							VARCHAR(200),
	
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
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_event_location_id
    FOREIGN KEY (event_region) REFERENCES region (region_id)
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

ALTER TABLE event 
	ADD CONSTRAINT fk_event_event_location_id 
	FOREIGN KEY (event_location_id) REFERENCES event_location (event_location_id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE account_event
	ADD CONSTRAINT fk_account_event_account_id 
	FOREIGN KEY (account_id ) REFERENCES account (account_id),
	ADD CONSTRAINT fk_account_event_event_id 
	FOREIGN KEY (event_id ) REFERENCES event (event_id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;
	
ALTER TABLE project_judge 
	ADD CONSTRAINT fk_project_judge_project_id 
	FOREIGN KEY (project_id) REFERENCES project (project_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_project_judge_criteria_id 
	FOREIGN KEY (criteria_id) REFERENCES criteria (criteria_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;
	
ALTER TABLE competition 
	ADD CONSTRAINT fk_competition_event_location_id 
	FOREIGN KEY (event_id) REFERENCES event (event_id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_competition_director_id 
	FOREIGN KEY (director_id) REFERENCES account (account_id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;

ALTER TABLE sponsor_contact 
	ADD CONSTRAINT fk_sponsor_contact_sponsor_id 
	FOREIGN KEY (sponsor_id) REFERENCES sponsor (sponsor_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION,
	
	ADD CONSTRAINT fk_sponsor_contact_contact_id 
	FOREIGN KEY (contact_id ) REFERENCES account (account_id) 
	MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;	
	