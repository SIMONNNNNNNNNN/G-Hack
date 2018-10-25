-- This will show all information about "State Event".
SELECT *
FROM state_event,event_location,region as child, region as parent
where state_event.state_event_id = event_location.event_location_id
	and event_location.event_region = child.region_id
	and child.parent_region = parent.region_id;

-- This will show basic information about "State Event" used on "Events" page.
SELECT type as eventType, event_date as eventDate, child.name as eventSelfRegion, parent.name as eventParentRegion
FROM state_event,event_location,region as child, region as parent
where state_event.state_event_id = event_location.event_location_id
	and event_location.event_region = child.region_id
	and child.parent_region = parent.region_id;

-- This will show all information about "National Event".
SELECT *
FROM national_event,event_location,region as child, region as parent
where national_event.national_event_id = event_location.event_location_id
	and event_location.event_region = child.region_id
	and child.parent_region = parent.region_id;

-- This will show basic information about "National Event" used on "Events" page.
SELECT type as eventType, event_date as eventDate, child.name as eventSelfRegion, parent.name as eventParentRegion
FROM national_event,event_location,region as child, region as parent
where national_event.national_event_id = event_location.event_location_id
	and event_location.event_region = child.region_id
	and child.parent_region = parent.region_id;
	