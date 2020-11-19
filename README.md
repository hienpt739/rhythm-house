# DATABASE : rhythmHouseManagement

## TABLE

### Categories

- id
- name (R'n Roll, Classic, Jazz, 60's & 70's)

### Albums

- id
- id_category: FK_Categories
- name
- artist
- performence: (solo, band...)
- releaseYear
- price
- created
- updated

### Puslish_Type

- id
- name (CD, DVD, Tape, Magazine...)

### Albums_Available

- id_Albums: FK_Albums
- id_Puslish_Type: FK_Puslish_Type
- num (available)

### Customers

- id
- id_user
- name
- email
- phone
- address
- isMember (default: 0 -> not a member)
- reciveMessage(email/phone: 0 or 1)

### Users

- id
- firstName
- lastName
- email
- phone
- password

### Orders

- id
- id_Customers
- created


id1 -- kh3
id2 -- kh3 


### OrderDetails
- id_Orders
- id_Albums
- id_Puslish_Type
- price
- num


order1 -- album2 -- CD -- 50000 -- 2 
order1 -- album2 -- DVD -- 50000 -- 3

