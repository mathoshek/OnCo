<?php

require_once 'Contact.php';

class ContactsFilter
{
    private $filters;

    public function addFirstNameFilter($filter)
    {
        $this->filters[CONTACT_FIRST_NAME] = $filter;
    }

    public function addLastNameFilter($filter)
    {
        $this->filters[CONTACT_LAST_NAME] = $filter;
    }

    public function addJobFilter($filter)
    {
        $this->filters[CONTACT_JOB] = $filter;
    }

    public function addBirthdayFilter($filter)
    {
        $this->filters[CONTACT_BIRTHDAY] = $filter;
    }

    public function addPhoneNumberFilter($filter)
    {
        $this->filters[CONTACT_PHONE_NUMBER] = $filter;
    }

    public function addHobbyFilter($filter)
    {
        $this->filters[CONTACT_HOBBY] = $filter;
    }

    public function addDescriptionFilter($filter)
    {
        $this->filters[CONTACT_DESCRIPTION] = $filter;
    }

    public function addEmailFilter($filter)
    {
        $this->filters[CONTACT_EMAIL] = $filter;
    }

    public function getFilters()
    {
        return $this->filters;
    }
} 