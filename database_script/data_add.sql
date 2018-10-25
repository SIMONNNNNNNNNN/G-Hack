--version 3 *********************************************************************************************************************************

INSERT INTO public.account (privilege,email_address,"password","name",preferred_name,profile_picture,facebook,hear_from,dietary_requirement,communication_preference,tshirt_size,bank_detail,full_legal_name,departure_airport,flight_preference,room_share_preference,team_id) VALUES 
(NULL,'jian.dong1@uq.edu.au','$2y$10$STM85lQVrzTbGnxuYkHzOe7nSDOZ4fry1R.a0u/OMIGyY4XNH.rwm','Jian','Oliver',NULL,NULL,NULL,'1','2','3',NULL,'Oliver','4','5','6',NULL)
,(NULL,'a@a.com','$2y$10$UMIHQB2KkDgPBWfOwMFlBe8ItS9OMFF8dIJ9IoWPxV.N1744UaYw2','zhi chen','',NULL,NULL,NULL,'','','',NULL,'','','a','',1)
,(NULL,'ivanlitvinov29@gmail.com','','Ivan Litvinov',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1)
,(NULL,'bla@blabla.com','$2y$10$w4b5nWtMuQMsp4nd3sBuEul6cokR8ww6w4/FKwC9kOxig7JH9Kse.','Ivan L',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1)
,(NULL,'b@b.com','$2y$10$P6PZXgJh6zBFaSYIbXADmuPKYcYhiDLLybImB9HlPe1so0KZNdwTW','Ivan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1)
,(NULL,'x@x','$2y$10$dEGTUEQ3r4kzmHHL9Z2qM.d9av9I/TT.0pt2aF4.T9gnLHnzdIbka','xxx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1)
,(NULL,'qqq@qqq','$2y$10$dEGTUEQ3r4kzmHHL9Z2qM.d9av9I/TT.0pt2aF4.T9gnLHnzdIbka','qqq',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1)
,('managementTeam','zhi.chen1@uqconnect.edu.au','$2y$10$zGmOCeqLSjk1xGBtqcnCWuLZbGHr.upKODIb2lcEqKbvugvStuaau','zhi chen','Simon',NULL,NULL,NULL,'','','',NULL,'','','','',1)
,(NULL,'c@c.com','$2y$10$bvRIi46TCSEqyAOdooymX.22A6KhgW6aqipwvkZPMXs28Jy3VPxIy','Ivan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1)
,(NULL,'meterwestion8512@gmail.com','','Zhi Chen',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1)
;
INSERT INTO public.account (privilege,email_address,"password","name",preferred_name,profile_picture,facebook,hear_from,dietary_requirement,communication_preference,tshirt_size,bank_detail,full_legal_name,departure_airport,flight_preference,room_share_preference,team_id) VALUES 
(NULL,'test1@xxx','$2y$10$VaAuRRpdrgvws8wRS.O/9u810sj2JBMXMfwhbfiEHV.I6T1p1IYG6','test1',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)
,(NULL,'shengyaozhuang@gmail.com','$2y$10$GPmsIPmrVCJZiC0bOoZs2u8rzHAQcahq7FMO2R1vGTqn6d6do5Oqe','Arvin',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)
,(NULL,'njumy2012@gmail.com','$2y$10$praDhDtbdSlCvJLj54b/HeQN0WBvLSIDHjHIfNbPw67WajBw6mgA.','yumiao',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)
,(NULL,'dong2016jian@gmail.com','$2y$10$hhBXpzw3KHkzQqVUcAzwT.OmzU9adnjoV1s.5W9/YFxaHAw7hrwRe','Oliver',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1)
,(NULL,'a@aa.com','$2y$10$KS8Q/Pud2pDk8nZ0p0MZHOBOI0RfKgu9m4zhxHpcv6/jcUIwEYkiW','11',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)
,(NULL,'sebastian_zuloagad@hotmail.com','$2y$10$XZTPdalCYMhqLtnD3iQLpestJFbMopwMA3V.iFd1F2wbXpgOdzr1e','Sebastian Zuloaga',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)
,(NULL,'yo131107@nate.com','$2y$10$w6kPaxD9k6CipjCjXENCxuskk23dhbjIpU8nGJmpTdo/lhZMHf16C','Bryan Mills',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)
,(NULL,'Zhi.chen1@uqconnect.edu.au','','chen zhi',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)
,(NULL,'uniuq123@gmail.com','$2y$10$H10abLC175y.3.vnyWCIhu9xjr/N4llWHJF0s5wHMjfi8.Hr09k/S','Elbert',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL)
,(NULL,'albakor@outlook.com','$2y$10$iaT0Tk.m8.ZII.kbL.ITLeFW73EikTDZUsG0ek1HHbPPruhgxz8.q','Ivan',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,1)
;

INSERT INTO region(name,timezone_offset) 
	VALUES 
	('Queensland','0'),('New South Wales','0'),('Northern Territory','0'),('Tasmania','0'),('Western Australia','0');
	
INSERT INTO region(name,timezone_offset,parent_region) 
	VALUES 
	('Brisbane','0','1'),('Sydney','0','2'),('Darwin','0','3'),('Hobart','0','4'),('Perth','0','5');
	
INSERT INTO event_location (name, event_host,event_support,email_address,twitter_account,twitter_name,address,accessibility_information,youth_support_information,capacity,parking_information,public_transfer_information,hours_of_operation_information,catering_information,latitude,longitude,event_region) 
	VALUES
    ('event_location_1', '1','1','event_email_1','twitter_account_1','twitter_name_1','address_1','accessibility_information_1','youth_support_information_1','300','parking_information_1','public_transfer_information_1','4','catering_information_1','000','000','6'),
	
	 ('event_location_2', '1','1','event_email_2','twitter_account_2','twitter_name_2','address_2','accessibility_information_2','youth_support_information_2','300','parking_information_2','public_transfer_information_2','4','catering_information_2','000','000','7'),
	 
	 ('event_location_3', '1','1','event_email_3','twitter_account_3','twitter_name_3','address_3','accessibility_information_3','youth_support_information_3','300','parking_information_3','public_transfer_information_3','4','catering_information_3','000','000','8'),
	 
	 ('event_location_4', '1','1','event_email_4','twitter_account_4','twitter_name_4','address_4','accessibility_information_4','youth_support_information_4','300','parking_information_4','public_transfer_information_4','4','catering_information_4','000','000','9');
	 
INSERT INTO public."event" (event_location_id,registration_setting,event_date,flight_option_to,flight_option_from,event_type,region_type) VALUES 
(1,'Open','2018-11-13 16:00:00.000','flight_to_1','flight_from_1','connections','national')
,(2,'OpenAndInvitations','2018-11-14 16:00:00.000','flight_to_2','flight_from_2','connections','national')
,(3,'InvitationsOnly','2018-11-15 16:00:00.000','flight_to_3','flight_from_3','competitions','national')
,(1,'Open','2018-10-10 16:00:00.000',NULL,NULL,'connections','state')
,(2,'OpenAndInvitations','2018-11-11 16:00:00.000',NULL,NULL,'connections','state')
,(3,'InvitationsOnly','2018-11-12 16:00:00.000',NULL,NULL,'competitions','state')
,(4,'InvitationsOnly','2018-11-13 16:00:00.000',NULL,NULL,'remoteEvent','state')
;

INSERT INTO public.account_event (account_id,event_id) VALUES 
(1,5)
,(1,11)
,(1,7)
,(1,8)
,(2,5)
,(2,10)
,(2,11)
,(2,9)
,(20,5)
;

INSERT INTO public.challenge ("name",region,short_description,long_description,image_url,video_url,dataset_field_url,eligibility_criteria_description) VALUES 
('A New Start',1,'How can we improve the process of starting or growing a business?','How can we improve the process of starting or growing a business?
Using the Geocoded National Address File (G-NAF), and potentially using government business services from https://www.industry.gov.au/','https://image.freepik.com/free-photo/abstract-yellow-brush-stroke-on-white-background_23-2147835995.jpg                                                                                                 ',NULL,NULL,'Must use GNAF')
,('Australians'' stories',1,'What meaningful ways can we tell the story about what it''s like to be an Australian, and in what ways some Australians live very different lives than others? How can we make people more aware of the i','What meaningful ways can we tell the story about what it''s like to be an Australian, and in what ways some Australians live very different lives than others? How can we make people more aware of the i','https://image.freepik.com/free-vector/gradient-blue-abstract-background_1159-3089.jpg                                                                                                                   ',NULL,NULL,'Must use GNAF')
,('Bounty: Decision Support',2,'How can we make it easy to use weather and ocean data to our advantage? (e.g. when should you lay concrete, or go out yachtting or picnicking?)','How can we make it easy to use weather and ocean data to our advantage? (e.g. when should you lay concrete, or go out yachtting or picnicking?)
We are all faced with a lot of weather-dependent decisio','https://image.freepik.com/free-vector/monochrome-low-poly-background_1048-8601.jpg                                                                                                                      ',NULL,NULL,NULL)
,('Bounty: Unmasking the State / Territory employment',3,'How can we unmask the hidden data behind the labour market in our states and territories?','How can we unmask the hidden data behind the labour market in our states and territories?
What does the Employment Fund expenditure or vacancy data reveal about State/Territory labour markets?','https://image.freepik.com/free-vector/gradient-blue-abstract-background_1159-3089.jpg                                                                                                                   ',NULL,NULL,NULL)
;

INSERT INTO public.dataset (dataset_url,description,region_id,name) VALUES 
('www.1.com
','dataset 1',1,'dataset_name 1')
,('www.2.com','dataset 2',2,'dataset_name 2')
,('www.3.com','dataset 3',3,'dataset_name 3')
,('www.4.com','dataset 4',4,'dataset_name 4')
,('www.5.com','dataset 5',5,'dataset_name 5')
,('www.6.com','dataset 6',6,'dataset_name 6')
,('www.7.com','dataset 7',5,'dataset_name 7')
,('www.8.com','dataset 8',5,'dataset_name 8')
;

INSERT INTO public.project (title,thumbnail_image,high_resolution_image,description,data_story,source_code_url,video_url,homepage_url,team_id,event_location_id) VALUES 
('#qldanzac','https://image.freepik.com/free-photo/abstract-yellow-brush-stroke-on-white-background_23-2147835995.jpg',NULL,'Create a showcase of WW1 Content (QLD focus) using modern applications to help connect current and future generations of Queenslanders connect with the legacy of WW1.','Project Goal: Connecting current and future generations with the legacy of ww1 as Robyn from the State Library of Queensland Said said the art of Story telling and pictures are powerful pictures tool ','https://drive.google.com/drive/folders/1agDhB3fx1HKH86CbLNxvZUhT4S1Zux9M','https://vimeo.com/288922498','https://www.instagram.com/qldanzac/?hl=en',1,1)
,('Some project 5',NULL,NULL,'','','https://nvie.com/posts/a-successful-git-branching-model/','http://www.google.ru','http://www.yandex.ru',1,2)
,('Email setup on server',NULL,NULL,'','','','','',1,3)
,('Another project',NULL,NULL,'Something','something else','https://nvie.com/posts/a-successful-git-branching-model/','https://youtu.be/Z1BCujX3pw8','http://www.yandex.ru',1,2)
,('Testing markdown',NULL,NULL,'# The Health Search Tutorial

Welcome to the homepage for The Health Search Tutorial - a **full** day on all things Information Retrieval for the Health domain.

Quick links: 
* SIGIR 2018 [tutorial slides](https://github.com/ielab/health-search-tutorial/tree/master/slides)','## Format and Schedule

### Session 1: Background & Theory

#### Introduction to the health domain and to the tutorial

The tutorial begins with an introduction to IR in health, giving an overview of the topics that will be covered in the tutorial and why they are important.  

*Duration: 15m*','','','',1,NULL)
;

INSERT INTO public.project_challenge (project_id,challenge_id,justification) VALUES 
(7,3,NULL)
;

INSERT INTO public.project_dataset (project_id,dataset_id) VALUES 
(1,1)
,(2,2)
,(1,4)
;

INSERT INTO public.team ("name",captain) VALUES 
('NT BBQ Movement',1)
;




--version2**************************************************************************************************************************
INSERT INTO account (email_address, name, password) VALUES
    ('dong2016jian@gmail.com', 'Oliver','$2y$10$H2bznMkH.bQ/ScRMgqvsOO.Q/IDKNHFYlQ2.hnX.tSDkV7BDnAYGu'),
    ('jian.dong1@uq.edu.au', 'Jian','$2y$10$H2bznMkH.bQ/ScRMgqvsOO.Q/IDKNHFYlQ2.hnX.tSDkV7BDnAYGu');


INSERT INTO region(name,timezone_offset) 
	VALUES 
	('Queensland','0'),('New South Wales','0'),('Northern Territory','0'),('Tasmania','0'),('Western Australia','0');
	
INSERT INTO region(name,timezone_offset,parent_region) 
	VALUES 
	('Brisbane','0','1'),('Sydney','0','2'),('Darwin','0','3'),('Hobart','0','4'),('Perth','0','5');


INSERT INTO event_location (name, event_host,event_support,email_address,twitter_account,twitter_name,address,accessibility_information,youth_support_information,capacity,parking_information,public_transfer_information,hours_of_operation_information,catering_information,latitude,longitude,event_region) 
	VALUES
    ('event_location_1', '1','1','event_email_1','twitter_account_1','twitter_name_1','address_1','accessibility_information_1','youth_support_information_1','300','parking_information_1','public_transfer_information_1','4','catering_information_1','000','000','6'),
	
	 ('event_location_2', '1','1','event_email_2','twitter_account_2','twitter_name_2','address_2','accessibility_information_2','youth_support_information_2','300','parking_information_2','public_transfer_information_2','4','catering_information_2','000','000','7'),
	 
	 ('event_location_3', '1','1','event_email_3','twitter_account_3','twitter_name_3','address_3','accessibility_information_3','youth_support_information_3','300','parking_information_3','public_transfer_information_3','4','catering_information_3','000','000','8'),
	 
	 ('event_location_4', '1','1','event_email_4','twitter_account_4','twitter_name_4','address_4','accessibility_information_4','youth_support_information_4','300','parking_information_4','public_transfer_information_4','4','catering_information_4','000','000','9');

	

INSERT INTO state_event(event_location_id,registration_setting,type,event_date) 
	VALUES 
	('1','Open','connections','2018-10-10 16:00:00+10'),
	('2','OpenAndInvitations','connections','2018-11-11 16:00:00+10'),
	('3','InvitationsOnly','competitions','2018-11-12 16:00:00+10'),
	('4','InvitationsOnly','remoteEvent','2018-11-13 16:00:00+10');
	
INSERT INTO national_event(event_location_id,registration_setting,flight_option_to,flight_option_from,type,,event_date) 
	VALUES ('1','Open','flight_to_1','flight_from_1','connections','2018-11-13 16:00:00+10'),
	('2','OpenAndInvitations','flight_to_2','flight_from_2','connections','2018-11-14 16:00:00+10'),
	('3','InvitationsOnly','flight_to_3','flight_from_3','competitions','2018-11-15 16:00:00+10');

INSERT INTO state_event_register(account_id, state_event_id)
	VALUES ('1', '1'),('1', '2'),('1', '3'),('1', '4'),
		   ('2', '1'),('2', '2'),('2', '3'),('2', '4');
	
INSERT INTO event(event_location_id,registration_setting,type,event_date) 
	VALUES 
	('1','Open','connections','2018-10-10 16:00:00+10'),
	('2','OpenAndInvitations','connections','2018-11-11 16:00:00+10'),
	('3','InvitationsOnly','competitions','2018-11-12 16:00:00+10'),
	('4','InvitationsOnly','remoteEvent','2018-11-13 16:00:00+10');
	
INSERT INTO event(event_location_id,registration_setting,flight_option_to,flight_option_from,type,event_date) 
	VALUES ('1','Open','flight_to_1','flight_from_1','connections','2018-11-13 16:00:00+10'),
	('2','OpenAndInvitations','flight_to_2','flight_from_2','connections','2018-11-14 16:00:00+10'),
	('3','InvitationsOnly','flight_to_3','flight_from_3','competitions','2018-11-15 16:00:00+10'),
	('1','Open',null,null,'connections','2018-10-10 16:00:00+10'),
	('2','OpenAndInvitations',null,null,'connections','2018-11-11 16:00:00+10'),
	('3','InvitationsOnly',null,null,'competitions','2018-11-12 16:00:00+10'),
	('4','InvitationsOnly',null,null,'remoteEvent','2018-11-13 16:00:00+10');

