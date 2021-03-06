<?php
include(dirname(__FILE__)."/pagemaker.php");
putHeader("api");
?>

<p>
The NLPTools API is a simple JSON over HTTP RESTful web service for
natural language processing. It is especially focused on text 
classification and sentiment analysis.
</p>

<p>
It currently offers the following functionality:
<ul>
    <li>Sentiment analysis of online news media (service named:
        "sentiment_news"). General-purpose, multiple topics.</li>
</ul>
</p>
<p>
Custom development of other domain-specific solutions are 
<a href="mailto:alex@atrilla.net">available on demand</a>.
</p>

<h2>Usage</h2>
<p>
To analyse the sentiment of some text (in English), do a HTTP POST to
<i>http://nlptools.atrilla.net/api/</i> with form
encoded data containing the following parameters:
<ul>
    <li><b>service</b>: the name of the service, e.g., "sentiment_news".</li>
    <li><b>text</b>: the text to be analysed.</li>
</ul>
On success, a 200 OK response will be returned containing a JSON
object with the following attributes:
<ul>
    <li><b>likelihood</b>: the conditional probability of the input text
	with respect to the negative, neutral and positive sentiment 
        categories.</li>
    <li><b>label</b>: the most likely sentiment category, i.e., by Bayes
        decision rule, the one that has the highest likelihood probability.</li>
</ul>
</p>

<h3>Example</h3>
<p>
Here it is an example using curl:
</p>
<p><i>
$ curl -d "service=sentiment_news&text=The quick brown fox jumps over the lazy dog"  http://nlptools.atrilla.net/api/<br/>
{<br/>
&nbsp;&nbsp;"likelihood":{"NEG":0.27512539950382,"NEU":0.70691780429118,"POS":0.017956796204998},<br/>
&nbsp;&nbsp;"label":"NEU"<br/>
}
</i></p>

<h2>Free service limits</h2>
<p>
The public API service is for evaluating the toolkit. Input text is limited
to 2000 characters and a maximum of 500 queries are allowed per IP.
Higher limits (e.g., for commercial purposes) are also available:
</p>
<p>
<center>
<span data-icon="1" id="mashape-button" data-api="nlptools" data-name="atrilla"></span><script src="https://www.mashape.com/embed/button.js"></script>
</center>
</p>

<?php
putFooter();
?>
