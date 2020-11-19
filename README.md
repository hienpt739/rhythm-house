# DATABASE : rhythmMusicManagement

## TABLE

### Categories

- id
- name (R'n Roll, Classic, Jazz, 60's & 70's)

### Albums

- id
- name
- type: FK_Categories
- artist
- performence: (solo, band...)
- release year
- price
- total
- created
- updated

### Puslish_Type

- id
- name (CD, DVD, Tape, Magazine...)

### Albums_Available

- id_Albums: FK_Albums
- id_Puslish_Type: FK_Puslish_Type
- num (available):
  <<<<<<< HEAD
  =======

### Customers

- id
- name
- email
- address

### Orders

- id
- id_Albums
- id_Customers
- price
- created_at
- order_at
  > > > > > > > f437d9090530a71abdce0244e51b16ca70846db1
