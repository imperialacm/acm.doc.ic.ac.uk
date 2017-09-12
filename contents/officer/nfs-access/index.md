---
title: NFS access
order: 4
template: officer-item.jade
---
We store some files on CSG's [NFS](https://en.wikipedia.org/wiki/Network_File_System)
infrastructure.

We will contact CSG for you to add your login to the ``acm`` group to have access
to ``/vol/acm/`` This shared drive is mainly used to store photos of
Student Chapter events.

## Accessing under Windows

You need to be in the college network or using the VPN for this to work. In the
"run window" (windows key + R) type ``\\fs-vol-acm.doc.ic.ac.uk\acm``. You will
be asked for login credentials, use ``WIN\<your username>`` for the username
(e.g. if your username is ``foo23`` then you would use ``WIN\foo23``) and your
normal DoC password.

## Accessing under Linux

If you are using CSG Linux install then simply run in a terminal

```
$ cd /vol/acm/
```

This will trigger an automatic mounting of the filesystem if it isn't already
mounted.

If you are not using a CSG Linux install then many file managers support browsing
Samba shares. Note you need to be in the college network for this to work.

### Dolphin (KDE)

In the file path text box type

```
smb://fs-vol-acm.doc.ic.ac.uk/acm
```

press enter. You will be prompted for login details. For username use ``WIN\<your username>``
(e.g. if your username is ``foo23`` the you would use ``WIN\foo23``) and your normal DoC password.

### Nautilus (GNOME)
TODO
