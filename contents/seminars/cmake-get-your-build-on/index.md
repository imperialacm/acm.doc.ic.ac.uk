---
title: CMake - Get your build on!
date: 05/23/2014 15:00
author: daniel-liew
room: Huxley 217
template: seminar.jade
---
Building C/C++ code is probably a frequent occurrence for many in the
department. But how many know how to write a *good* build system for
their C/C++ project? In this tutorial I will introduce you to CMake
which is a cross platform meta build system that will read a description
of your project and generate a build system from that.  Notable
supported outputs include make files, Eclipse projects, XCode projects,
Visual studio projects and ninja files (hell yeah!). In this tutorial I
will show you how to write a build system for your project that includes
handling external libraries, generating documentation (doxygen), unit
testing (GoogleTest framework) and more. I will try to do this as an
interactive tutorial so feel free to bring your laptop and follow along.