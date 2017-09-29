---
title: "Big Data Processing: Navigating in a Zoo of Yellow Elephants, Sharks, and Giraffes"
date: 11/03/2014 13:00
author: lukas-rupprecht
room: Huxley 145
template: event.jade
---
Big Data Processing: Navigating in a Zoo of Yellow Elephants,
Sharks, and Giraffes

The term "Big Data" was ranked 10 on the Global Language Monitor's 2013 top
business buzzwords. However, behind the marketing phrase hides the actual hard
problem of how to cope with huge amounts of possibly unstructured data that are
produced at very high rates. Storing and processing that data is highly
valuable as it provides insights that can be used by businesses to enhance user
experience (making recommendations, refining search results, etc.) or to
support decision making. However, traditional approaches are not able to
provide feasible analysis at the required scale.

In this talk I will give an overview of existing software systems that aim to
achieve this goal. I will start with MapReduce and its open-source
implementation Hadoop, the most prominent among big data processing systems,
and look at its basic concepts that enable users to conveniently analyse data
at scale. I will also discuss its drawbacks and then introduce more advanced
systems such as Spark that enable richer analytics via general, flow-based,
programming APIs. Finally, I will briefly talk about network transfers as one
major bottleneck these systems face and introduce NetAgg, a system developed in
the LSDS group.  NetAgg can reduce the amount of transferred data by performing
early aggregation inside the network and hence, reduce the time it takes to
analyse data.

The aim of this talk is to give a high-level introduction to the Zoo of systems
that are out there to process big data and present some research directions we
are pursuing in the [LSDS group](http://lsds.doc.ic.ac.uk/).


<span class="more"></span>

<iframe class="center-block" width="560" height="315" src="//www.youtube.com/embed/n0PL74zwaoM" frameborder="0" allowfullscreen></iframe>
