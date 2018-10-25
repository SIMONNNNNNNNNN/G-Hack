ALTER TABLE event_location 
    ADD event_region INTEGER,
    ADD CONSTRAINT fk_event_location_id
        FOREIGN KEY (event_region) REFERENCES region (region_id)
        MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION;



CREATE TABLE state_event_register(
    account_id                  INTEGER,
    state_event_id              INTEGER,

    CONSTRAINT pk_state_event_register PRIMARY KEY (account_id,state_event_id),
    CONSTRAINT nn_state_event_register_account_id CHECK (account_id IS NOT NULL),
    CONSTRAINT nn_state_event_register_state_event_id CHECK (state_event_id IS NOT NULL),
    CONSTRAINT fk_state_event_register_account_id 
	            FOREIGN KEY (account_id ) REFERENCES account (account_id),
     CONSTRAINT fk_state_event_register_state_event_id 
	            FOREIGN KEY (state_event_id ) REFERENCES state_event (state_event_id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION

);


CREATE TABLE national_event_register(
    account_id                  INTEGER,
    national_event_id           INTEGER,

    CONSTRAINT pk_national_event_register PRIMARY KEY (account_id,national_event_id),
    CONSTRAINT nn_national_event_register_account_id CHECK (account_id IS NOT NULL),
    CONSTRAINT nn_national_event_register_national_event_id CHECK (national_event_id IS NOT NULL),
    CONSTRAINT fk_national_event_register_account_id 
	            FOREIGN KEY (account_id ) REFERENCES account (account_id),
     CONSTRAINT fk_national_event_register_state_event_id 
	            FOREIGN KEY (national_event_id ) REFERENCES national_event (national_event_id) MATCH SIMPLE ON UPDATE NO ACTION ON DELETE NO ACTION

);

--view for showing information about state event information
CREATE VIEW state_event_information_view AS
SELECT state_event.state_event_id,type as event_Type, event_date as event_Date, child.name as event_SelfRegion, parent.name as event_ParentRegion
FROM state_event,event_location,region as child, region as parent
where state_event.event_location_id = event_location.event_location_id
and event_location.event_region = child.region_id
and child.parent_region = parent.region_id
ORDER BY event_Date ASC, event_ParentRegion ASC, event_SelfRegion ASC, event_Type ASC;

--view for showing state event register information
CREATE VIEW state_event_register_view AS
SELECT account.name, account.email_address, state_event_information_view.state_event_id,event_Type,state_event_information_view.event_Date,state_event_information_view.event_SelfRegion
FROM state_event_register, account, state_event,state_event_information_view
WHERE state_event_register.account_id = account.account_id
        AND state_event_register.state_event_id = state_event.state_event_id
        AND state_event_information_view.state_event_id = state_event_register.state_event_id;



--change type CHAR to VARCHAR
ALTER TABLE account 
    ALTER email_address TYPE VARCHAR(50),
    ALTER profile_picture TYPE VARCHAR(100),
    ALTER social_media_handle TYPE VARCHAR(100),
    ALTER hear_from TYPE VARCHAR(100),
    ALTER dietary_requirement TYPE VARCHAR(100),
    ALTER communication_preference TYPE VARCHAR(100),
    ALTER tshirt_size TYPE VARCHAR(100),
    ALTER bank_detail TYPE VARCHAR(100),
    ALTER full_legal_name TYPE VARCHAR(100),
    ALTER departure_airport TYPE VARCHAR(100),
    ALTER flight_preference TYPE VARCHAR(100),
    ALTER room_share_preference TYPE VARCHAR(100);
ALTER TABLE region 
    ALTER name TYPE VARCHAR(50);
ALTER TABLE challenge 
    ALTER name TYPE VARCHAR(50);
ALTER TABLE state_event 
    ALTER registration_setting TYPE VARCHAR(50);

ALTER TABLE national_event 
    ALTER registration_setting TYPE VARCHAR(50);
ALTER TABLE criteria 
    ALTER name TYPE VARCHAR(50);
ALTER TABLE competition 
    ALTER name TYPE VARCHAR(50);
ALTER TABLE event_location 
    ALTER accessibility_information TYPE VARCHAR(1000),
    ALTER youth_support_information TYPE VARCHAR(1000),
    ALTER parking_information TYPE VARCHAR(1000),
    ALTER public_transfer_information TYPE VARCHAR(1000);


--add tables for volunteer system
CREATE TABLE volunteering_position(
    volunteering_position_id    SERIAL, 
    role           				VARCHAR(30),
	region_id					INTEGER,
	available_number			INTEGER,
	description					VARCHAR(250),
	
	CONSTRAINT pk_volunteering_position PRIMARY KEY (volunteering_position_id),
    CONSTRAINT nn_volunteering_position_role CHECK (role IS NOT NULL),
	CONSTRAINT nn_volunteering_position_available_number CHECK (available_number IS NOT NULL),
	CONSTRAINT nn_volunteering_position_description CHECK (description IS NOT NULL),
	
    CONSTRAINT fk_volunteering_position_region_id 
	            FOREIGN KEY (region_id) REFERENCES region (region_id)
);

CREATE TYPE enum_application_state AS ENUM('submitted', 'approved', 'rejected');

CREATE TABLE volunteering_account(
	volunteer_id				SERIAL,
    volunteer_position          INTEGER,
	account_id					INTEGER,
	previous_experience			VARCHAR(250),
	availability				VARCHAR(250),
	previous_govhack_experience VARCHAR(250),
	apply_reason				VARCHAR(250),
	application_status			enum_application_state,
	
	CONSTRAINT pk_volunteering_account PRIMARY KEY (volunteer_id),
	CONSTRAINT nn_volunteering_account_previous_experience CHECK (previous_experience IS NOT NULL),
	CONSTRAINT nn_volunteering_account_apply_reason CHECK (apply_reason IS NOT NULL),
	CONSTRAINT nn_volunteering_account_application_status CHECK (application_status IS NOT NULL),
	
    CONSTRAINT fk_volunteer_position
	            FOREIGN KEY (volunteer_position) REFERENCES volunteering_position (volunteering_position_id),
	CONSTRAINT fk_volunteering_account_account_id
	            FOREIGN KEY (account_id) REFERENCES account (account_id)
	
);

CREATE TYPE enum_registration_setting AS ENUM('Open', 'OpenAndInvitations', 'InvitationsOnly');

ALTER TABLE state_event 
    ALTER registration_setting TYPE enum_registration_setting
	USING registration_setting::enum_registration_setting;


--remove Unique constraint uk_state_event_event_location_id in table 'state_event'
ALTER TABLE state_event
DROP CONSTRAINT uk_state_event_event_location_id;
