# triptip

Sort borading tickets that supplied unordered

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software and how to install them

php 5.6+


php.exe public/index.php

## input example:
[{"Departure":"Stockholm","Arrival":"New York","Transportation":"Plane","TransportationNumber":"SK22","Seat":"7B","Gate":"22"},{"Departure":"Madrid","Arrival":"Barcelona","Transportation":"Train","TransportationNumber":"78A","Seat":"45B"},{"Departure":"Gerona Airport","Arrival":"Stockholm","Transportation":"Plane","TransportationNumber":"SK455","Seat":"3A","Gate":"45B","Baggage":"334"},{"Departure":"Barcelona","Arrival":"Gerona Airport","Transportation":"Bus"}]


## output example:
1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.
2. You have arrived at your final destination. 2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.
3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 334.
4. From Stockholm, take flight SK22 to New York. Gate 22, seat 7B. Baggage will we automatically transferred from your last leg.

## Authors

* **Bara Batta** - *Initial work* - [barahijawi](https://github.com/barahijawi)


## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Acknowledgments

* this script support bus, train and plane for now
* we could add other transportation types 
* thank you for any comment.
