+++
authors = [
    "Hugo Authors",
]
title = "Python Flask Create News Web Application"
date = "2020-09-19"
description = "PyMOTW-3 is a series of articles written by [Doug Hellmann](http://doughellmann.com/) to demonstrate how to use the modules of the [Python](http://www.python.org/) 3 standard library. It is based on the original [PyMOTW](http://pymotw.com/2/) series, which covered Python 2.7. See [About Python Module of the Week](https://pymotw.com/3/about.html) for details including the version of Python and tools used."
tags = [
    "python",
    "flask",
 
]
categories = [
    "Coding",
    "Tutorials",
]
series = [""]
aliases = ["python-flask"]
images = [
    "standard_library.jpg",
]
+++

# Python Flask Create News Web Application

by  [Parwiz](https://codeloop.org/author/parwiz/ "View all posts by Parwiz")

In this  **Python Flask**  article iam going to show you how to  **Create News Web Application**, basically we are using News API website for getting our API Key. so simply you can open  [News API](https://newsapi.org/)  website after that create a New Account and get your API Key, for more information you can check the video for this article in the below.

Also you can check How To Build News Web Application In Django

[Build News Web Application In Django](https://codeloop.org/how-to-build-news-application-in-python-django/)

### **What is News API ?**

News API is a simple HTTP REST API for searching and retrieving live articles from all over the web. It can help you answer questions like:

-   What top stories is the NY Times running right now?
-   What new articles were published about the next iPhone today?
-   Has my company or product been mentioned or reviewed by any blogs recently?

You can search for articles with any combination of the following criteria:

-   **Keyword or phrase**. Eg: find all articles containing the word ‘Microsoft’.
-   **Date published**. Eg: find all articles published yesterday.
-   **Source name**. Eg: find all articles by ‘TechCrunch’.
-   **Source domain name**. Eg: find all articles published on nytimes.com.
-   **Language**. Eg: find all articles written in English.

You can sort the results in the following orders:

-   Date published
-   Relevancy to search keyword
-   Popularity of source

You need an API key to use the API – this is a unique key that identifies your requests. They’re free for development, open-source, and non-commercial use. You can get one here: [get API key](https://newsapi.org/register).

### **Installation**

You can simply install News API by using pip command


```py
pip install newsapi-python
```
### **What is Flask ?**

Flask is a web framework. This means flask provides you with tools, libraries and technologies that allow you to build a web application. This web application can be some web pages, a blog, a wiki or go as big as a web-based calendar application or a commercial website.

Flask is part of the categories of the micro-framework. Micro-framework are normally framework with little to no dependencies to external libraries. This has pros and cons. Pros would be that the framework is light, there are little dependency to update and watch for security bugs, cons is that some time you will have to do more work by yourself or increase yourself the list of dependencies by adding plugins.

### **Installation**

You can simply install Flask by pip


```py
pip install flask
```
OK after the installation process, you need to open an IDE , so iam using  [Pycharm IDE](https://www.jetbrains.com/pycharm/). after that Create New Project. and now you need to create a folder that is called templates. and also you need to create a Python file at name of  _App.py_. in the template you need to create two html files at name of  _bbc.html_  and  _index.html_  , now this is the structure of my project.

![Flask News Web Application Structure ](https://codeloop.org/wp-content/uploads/2019/12/python-flask-news-web-application.png)

index.html
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flask Aljazera English News</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="jumbotron" style="color:black">

    <h1 style="color:black">

        Flask Simple News Web Application

    </h1>

</div>


<div class="container">

    {% for new, des, i in context %}

    <img src="{{i}}" alt="">
    <h3>News: </h3> {{new}}
    <h4>Description: </h4> {{des}}

    {% endfor %}


</div>


</body>
</html>
```


This is bbc.html file
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Flask BBC News</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<div class="jumbotron" style="color:black">

    <h1 style="color:black">

        Flask Simple News Web Application

    </h1>

</div>


<div class="container">

    {% for new, des, i in context %}

    <img src="{{i}}" alt="">
    <h3>News: </h3> {{new}}
    <h4>Description: </h4> {{des}}

    {% endfor %}


</div>



</body>
</html>


```



And this is our App.py
```py
from flask import Flask, render_template
from newsapi import NewsApiClient




app = Flask(__name__)



@app.route('/')
def Index():
    newsapi = NewsApiClient(api_key="b0f75ce660c0466a9a98c2478f8abb62")
    topheadlines = newsapi.get_top_headlines(sources="al-jazeera-english")


    articles = topheadlines['articles']

    desc = []
    news = []
    img = []


    for i in range(len(articles)):
        myarticles = articles[i]


        news.append(myarticles['title'])
        desc.append(myarticles['description'])
        img.append(myarticles['urlToImage'])



    mylist = zip(news, desc, img)


    return render_template('index.html', context = mylist)



@app.route('/bbc')
def bbc():
    newsapi = NewsApiClient(api_key="YOUR-API-KEY")
    topheadlines = newsapi.get_top_headlines(sources="bbc-news")

    articles = topheadlines['articles']

    desc = []
    news = []
    img = []

    for i in range(len(articles)):
        myarticles = articles[i]

        news.append(myarticles['title'])
        desc.append(myarticles['description'])
        img.append(myarticles['urlToImage'])

    mylist = zip(news, desc, img)

    return render_template('bbc.html', context=mylist)



if __name__ == "__main__":
    app.run(debug=True)

```

So basically in the python file we have two view functions, the first one is for our Index and the second one is for bbc

Run the complete project and this will be the result

![Python Flask Create News Web Application](https://codeloop.org/wp-content/uploads/2019/12/flask-news-web-app.png)

Python Flask Create News Web Application

