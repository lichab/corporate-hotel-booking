Feature: Book a hotel room
    As an employee
    In order to do my job
    I need to book a room of a hotel

    TODO: Review the scenarios and answer the following question =>
        Are they following the BRIEF heuristic?
        Business Language (aka Ubiquitous Language)
        Real Data (based on real life example)
        Intention Revealing (each steps describe intentions, what the user is trying to achieve, rather than the mechanics, how she is trying to achieve it)
        Essential (Incidental details should be removed)
        Focused (on a single rule)

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
