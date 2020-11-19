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
- name
- email
- phone
- address
- isMember (default: 0 -> not a member)
- reciveMessage(email/phone: 0 or 1)

### Orders

- id
- id_Albums
- id_Customers
- price
- payment
- created
- orderTime
