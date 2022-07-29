Feature: Book a hotel room
    As an employee
    In order to do my job
    I need to book a room of a hotel

    Scenario: Succesfully book a hotel room
        Given the employee "Bob" from company "Acme"
        And the hotel "Tortilla" has the following rooms:
            | 1 | standard room |
            | 2 | standard room |
            | 3 | standard room |
        When Bob books the room number 1 in hotel "Tortilla"
        Then this room should be booked

    Scenario: Fail to book a hotel room when a company booking policy prevents me to do so
        Given the employee "Bob" from company "Acme"
        And the hotel "Tortilla" has the following rooms:
            | 1 | suite         |
            | 2 | standard room |
            | 3 | standard room |
        And that a booking policy for company "Acme" allows only standard room
        When Bob books the room number 1 in hotel "Tortilla"
        Then room should not be booked

    Scenario: Fail to book a room when an employee booking policy prevents me to do so
