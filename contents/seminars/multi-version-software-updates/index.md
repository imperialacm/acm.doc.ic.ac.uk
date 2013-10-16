---
title: "Multi-version Software Updates"
date: 05/25/2012
author: Petr Hosek
room: 572A
template: seminar.jade
---
Software updates present a difﬁcult challenge to the software
maintenance process. Too often, updates result in failures, and users
face the uncomfortable choice between using an old stable version which
misses recent features and bug ﬁxes, and using a new version which
improves the software in certain ways, only to introduce other bugs and
security vulnerabilities.

We propose a radically new approach for performing software updates:
whenever a new update becomes available, instead of upgrading the
software to the new version, we instead run the new version in parallel
with the old one. By carefully coordinating their executions and
selecting the behavior of the more reliable version when they diverge,
we can preserve the stability of the old version without giving up the
features and bug ﬁxes added to the new version.

In this talk, I will introduce a prototype system targeting multicore
CPUs. However, we believe this approach could also be deployed on other
parallel platforms, such as GPGPUs and cloud environments.
