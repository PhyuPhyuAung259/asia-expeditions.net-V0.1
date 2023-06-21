<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
			#container #containerHeader{
			    text-align: center;
			    cursor:move;
			}
			#container .editor1 {
			    border: 1px solid grey;
			    min-height: 200px;
			    max-height: 400px;
			    width: 100%;
			    margin: 0px auto 0;
			    padding:10px;
			   }
			#container fieldset {
			    margin: 2px auto 0px;
			    width: 100%;
			   /* height:26px;*/
			    background-color: #f2f2f2;
			    border:none;
			    padding: 6px;
			}			
			#container a {
			    text-align: center;
			    padding: 6px 14px;
			    height:20px;
			    width:20px;
			    background-repeat: no-repeat;
			    background-size: 20px;
			    border:none;
			    background-position: center;
			}
			#container img{
			      width:100%;
			}
			#container .bold{
			background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAABLCAYAAAA4TnrqAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAuIwAALiMBeKU/dgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJmSURBVHic7drPi05RHMfx18igGaaJzbAQShby22ZYKBb+CKyMJTsryo/IQigWUjbKnoWVpJSy8TOpIckCC0Xj1zTKGItLWcyZnmbuuY/z+L7rbO73PN/P93y65z73nHsIgiAIgiAIgiAIgiAIgiD43+lqSGc+1qB3Gr/9gfd4h5E6i/oX2YdRTNTQnuA4Fjc6gobYqLoz6jDq7/YVxzC7uaHk57D6jfq73cLCpgYzK3P+RZnz78ANzM2sg/xmNcEgLjQh1AlmwRA25RZpl1nXVa8trbYB7MbLRL4uHMlbcn7OmfzBfG2a+frxKJHzO/pmWO+UlDYNR1RTbjLmYHtO8dLMggd4nogtyylcolnwKnF9IKdoqWb1J65/yilaolkLsSERe5tTuESzjmJeInY3p3BJZvXgDPYn4k+ln2W10K5V+3pcarFvN5ZgCxZM0e/sTItqN6mX0rrbYw3MkpKmYYrP2IWfuYU6wayTeNaEUCeYdQhrmxDqBLP6cFW1NsxKu/4NX+Nmi327VcuYrdK7CmuwFxdnXFkbqXOLpgenE/km8KKGeqekpGk4ioM4n4ivxOqcBZRk1h+OYSwRG8wpXKJZH1W7pZOxPKdwiWaR/ozfnVO0VLNWJK5/ySlaolmbsSoRG84pXJpZ/biciI3jTk7xEszqUp2a2YP7WJfod1t1NKlYmtqimcC23IMp4c5qhSsyT0E6w6yHONCEUG6zPmTOfw87VRuAxZPr5N8YTmlgW6ZphvBNPSYN4wSWNjqC3zR1WrlXtZs5ndPK46rp/Ea1LgyCIAiCIAiCIAiCIAiCIAjaxi96FfJoiZEgRAAAAABJRU5ErkJggg==');
			}
			#container .italic{
			    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAABLCAYAAAA4TnrqAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAuIwAALiMBeKU/dgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAGDSURBVHic7do7SgRBFEbh0z5BwUhQTMxEMDAXQ1EXIS7AHehWBBMznQ0YizsQJhBfiIGB4Rjo4BiMRnZD11BV3eL5oNJbdS/VfyUNkiRJkiRJkvTfFU0f4Ns8sAZMRqr3AnSBfqR6rTABnACDBOsZ2MjXSnoHpBnUz3oApmIddixWoRFtJ66/DKzGKtb0sN4y7NHLsEcWW6T9DK9ozyMWxT5wC3wSb0g94BxYyNhHoxaBd8qH0WnwXK10RPXNSf0w/CkFcEP5oO5o/mFqlR2qb9Vhg+dqpQ7lg/oAlho8V+sY7AEM9poM9gAGewCDvSaDPYDBXpPBHsBgD2Cw12SwBzDYazLYAxjsAQz2mgz2AAZ7TQZ7AIM9gMHOMLTPgFeqb07o6gPXwF7GPpIrgEviDals7WbrJrEV0g5qAJxm66ZEzFdnJmKtKrMZ9qgUc1hd4ClivTIXietntcnwX84Un+AxMJ6vld9S/Og1DawDc5Hq9YF74DFSPUmSJEmSJEnSyL4AJ3NtCSNV9DYAAAAASUVORK5CYII=');
			}
			#container .underline{
			    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAABLCAYAAAA4TnrqAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAuIwAALiMBeKU/dgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJhSURBVHic7drNahNRGMbxfw1WLBaiVtSioLiQrHSpWxERxAvQCxDcqjdRRBBX4qbriis3ikLxAhR3UhRcKC3FD6wgtmJ1XJwUnGTONCd5z5yZ8PzgUEjI+57zdD6SmQERERERERERkaaZAuaAd90x132taT0qMQ9kPWO+gT2i2wls0L+QTWBPg3rk7IhRFJgFdhW83gL2N6hHTqywJoZ8r249cmKFNZYUVgCFFUBhBVBYARRWAIUVQGEFUFgBFFYAhRVAYQVQWAEUVoBYYW2UvLfXqEfZNaufRj1yYoW1hrtqWeSIUQ9fnb/Ad6MeOTG3rI+e984Z9fDV+QD8MupRmUf0Xx/PcIuZHLH2JO6fUVR/YcTaXjEP8M88rx8Fro1Y+zr+3dDXt9b2UXz3JQO+ASeHrNvBHZOK6q5jdwKp3D2KF5UBb4FjgfWO426m+mretZh0KgfwbwUZ8Am4NGCty8DnklprwIzh3JO4hX+BW2MRuAK0ez7bBq4CLwaocSPuMqoxATxk+8VujVXgTffvoJ9ZINK9whSmgFcMvviQ8ZKGPgxSZhp4jG1QT+nfdcdGC7gN/GG0kDZxjxe1qp1+Gh3CjmP/j+fAqeqnnN5Z4AGwTHlAy8B94EyaaTp1OoOcwH2rn8U9e/UbWAGWgPcJ5yUiIuMuxtlwGjgNHIpQe1CrwGvgR8I5bOsC8JU4vwFDxxfgfNzlDm83YVcKqhgrFD/+PRTLa/Ad4KBhPQuHcfMyYRlWlHt1Buo6LxZJv+v1/ug2Y302bAN3gIu4Y1gq68AT4CY13rJERERERERERJx/gYhfcxk8X00AAAAASUVORK5CYII=');
			}
			#container .align-left{
			    background-image : url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAAA1CAAAAAAsDUmHAAAAIGNIUk0AAHomAACAhAAA+gAAAIDoAAB1MAAA6mAAADqYAAAXcJy6UTwAAAACYktHRAAAqo0jMgAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+MIHAYHAD13ih8AAAIrSURBVEjHzZaxTxRBFMa/N7OH0FJqSwnChsTYnomKnJUKFOo1JrbGwpBYmwCV0X9AvMRK1IJ4OTtjYyCQ44xWtNpaa9x5z+IIt7vHbGYeV3DlJvfLm2++b76XCEb2S3DGWeJIRxBLJZboJxShAkvo94uuajBJH00ewZIj1J8bu4Y1LLPd/jLRh/VZLtnaPacTjGp7b5suyev1C5zp5CL8LGhPuASnFJ9xGXm9rNRXN0QVAZInV8Tm75FkfeWHSi+eTkueAHGaKv3Fpux7w6xDGTOcx8G3EeQx5m+WKlgiUZZgkJ9Ff9/sB9+jzN8dF/KwhOR2OzyPhrc+mmFYn8X2fXuMw8VPOu+W2HrmwmFUHhMcQjxnJMyAasEZIuAifHpZaTRbMXrduwnru0fCq5WDYL14bqHKq4LFxRh/SZW/yEU8OWQrMwR72jjmWE65DQxmHORRPRdT+S2UT10dKr1a6m2hB5vKfuTm60LXOtveTEj1GJJpLTeczefxG/BPe3u9hhTyOAWj7EeDqUI/Gtxa6Cj1yq7dgcnPJeZDq6vSi9P7pqA9SMYeqv011LXItKyhvRB0+s11QIjp7ZN7+ZjFUb19Ys8cZ9v0voejpmcr3kKhp2sU3h2yuu7tWmc/r8WckTeu1523H3dgI/JY46918ep1HiYJP6PBBa/2Fksv9yL6MZtf9vYjyXjneS+8H2cfT3i1B8nksxiLS2U/ShaxRkvlXjjaPOJMsf4DQ22vjD/V/uUAAAAASUVORK5CYII=');
			    width:40px;
			}

			#container .align-right{
			    background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAAA1CAAAAAAsDUmHAAAAIGNIUk0AAHomAACAhAAA+gAAAIDoAAB1MAAA6mAAADqYAAAXcJy6UTwAAAACYktHRAAAqo0jMgAAAAlwSFlzAAAuIwAALiMBeKU/dgAAAAd0SU1FB+MIHAYOC3tn6N4AAAIsSURBVEjHzZexaxRBFMa/NzMXkzaltimjcQmI7QlqzFmpSQr1GsFWLCRgLSSpRP8B44GViRYhx9mJjRgi54lWabW1VtyZZ5GAM7uZZeYlRbbchY8337zf+94axrE9Bidciy3JFFhTRYvlFTJToMX069lQVBgXDyYPxMyB1O9rO8pJtNRW/8PEvti+ljUbO6dkhlFr93XXGt+vn3ClzC7Cj8B7wgVYofkOF+H7pbm9vMYiBIgfXWLt3yPx6tJ3kV9uuqj0BMgVhbC/nKr2vXJOJqVUncf/746VbbY5EjUeQ8Cy2sOB4lr059Xn5Dvl2dvjAY/BR+Kb/XQ2ldvYVj6PQcn6TX/MpV+EGWwuOB2pC3tZbBrsgSNnJJwFtZJ5IuAcYn5p7nR7OX7duQ4du0fCi6UvyX6583NNvcqYn8/pL27qL7IZ44d0I0PQR+TRCreBel3MsloAOKrOQn43lEkVlytzguneujAfXfdlwLbV/XVDomFIqrfYsR6PjK/AX9kZDUYdn0fCFJQwHxWmAh4VbswNhH6VV25B+XWxetsbivxyxV0VzlXisfvi/qplLUqpVj2H6Oib6+EKORl+WG77UlkZXt8nvIfV6Fu61PRMwyxkerxC6dnBy6vRrLX6/UrOGd3a1baN5uMn6Aw2W+5jm6N+nYYy6WdUOBP1XmPh+W5GPpazi9F8JB4fPB2l5+PMw4mo9yCefJLT7tyYj1xmrNTcuBdK2Typ/7X/ACjdr4z8YnCHAAAAAElFTkSuQmCC');
			    width:40px;
			}
			#container .align-center{
			    width: 40px;		
			    background-image:url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABQAAAAOCAYAAAAvxDzwAAAABGdBTUEAALGPC/xhBQAAADRJREFUOBFjYGBg2ArE/6mEtzIBDaImADlsCAJSwhSkFgVQGoYjIMwIpdfRdAhJUYMrHQIAWPdBdW2q70gAAAAASUVORK5CYII=');
			}

			#container .redo-apply{
			    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAABLCAYAAAA4TnrqAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAuIwAALiMBeKU/dgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAKJSURBVHic7du7axRRGIbxn260MELQIoIIFjYBa01lI0btFVEQRBtbSeEFUmhnbeEfoOK1EkQQKxsLUbH00gQLxesuRBANMRZrIJHd2T3jzsyOfA98zdnZc9555sxyZnaGIAiCIAjqw2HcwTXsrjjLUHMBi8vqF85UmmhIWY95K2Ut1dkKcw0lEzqLCmEdWINPQljfHMCCENY3x/UWNlNZuiEkhCUSwhIJYYmEsERCWCIhLJFShK361w56MIot2IS1BY91DEd7bHMOFwvOkcQmnMZjvY92FTVd3K73zyjOY071QrLqJ7YXo6A/tuKF6kX0W6fy7ORIni/9xQQeYXwAfZVFq4pBN+C16mdKSr37k7t0bucIW2W1MFmIiR5Mat8LzzqC09iGRsFZRrT/zOglamfBObpyLyPYA4yVlKMfUU0VihrDjy7BnmNdSTmGXhQc6hBqqXaVlKFfUTtKytOVGZ3DvSlp/NqIgss6B7xVwtgNXO8yfqE/5nkXpd3WKc28QfpkBDdwMGObJvbi6aAHXz3g/hYH3N9yGrgiW1QL+xUgisHLKooGruJIxjYt7MOTokIM4tqwDC7JFtXEFJ4VGaIOM2scJzM+L0UU9ZhZ47pfLjWxR3shXDh1mFmv8KFD+1cliqIesuZxAt+Xtc0qWRT1OA3hvvbdiynt29YP8a3sEHWRBe+111mVUYfTcGgIWQmErARCVgIhK4GQlUDISiBkJRCyEghZCYSsBEJWAiErgZCVQMhKIGQlELISCFkJhKwEQlYCISuBkJVAXlkLXdqLfOSocvLKetmlfTZnf/81m/HRykcT32JjlaGKJu/D/HO4qf2+4hfc1X5B8vOAcgVBEARBMJT8BsNk0YqzYcGdAAAAAElFTkSuQmCC');
			}
			#container .undo-apply{
			    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAABLCAYAAAA4TnrqAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAuIwAALiMBeKU/dgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAALFSURBVHic7ZzPi05RGMc/M0aSJDZMUXaSlB3T+DGkWCgW2Cn+AYVsSBo/xm78LpoihcmUlIXyIxbWYolSQ7IgeY0fM2Te1+JsmO499zz3fZ97jvF86mxuvef53k/nvfe8z729YBiGYRhGHLYCQ8A1YEPkLMnSBpwDGhPGrpihUiRPVAN4FzFXcrQBZ8gW1QDqwPRo6RLjFPmiGsDTeNHSoh+/qFGgK1q6hOjDL+oHsClauoQ4jokK4hgmKoijmKggjmCigujFRAVxGBMVxH7+E1EdTX7+AG6L4OMsMAasb7JWFp+AYeCjwtwtZS/+FVXleA1cBjYC7ZonXYYlwE/iS8oaL4EduB/vSbCH+FKKxmNgYStPuuyS/dzKEEqsxHUz1sYOMhvXsIu9ekLGGO5aFpXlQI34MkLGV2CZjoZwVuC+kr6gQzS/RcliKrAA2A7cAH4V5HgBzFDIIaKLYmGDwBTlHIuBRwU5+pQzBNENjOAPehV9YR3ARU+G78Bc5QxBdANf8Au7gv6msR245cnQq1w/mFUUC7uEvrBZwIec+q+Ua4tYjbv7+IQNoL/D3uepv0i5tog1FAu7gK6wecB4Tu3knoD3AN/wCzuPrrAnOXVPKNYsTcg17DR6wm7m1BxQqtc06yheYQeVaudtIwbLTFZF7+chsBn35DmPQ7g7WKupt3KyqhplD/ALmwbMryhLaarsKt4HtuC6ABMZIbH9TxZVt2Dv4YTV/jhWB3aTLTEpNLoBRdwFlgLbgJnAbeBZhBxiYsgCeAucjFS7NMk9CUkZkyXAZAkwWQJMlgCTJcBkCTBZAkyWAJMlwGQJMFkCTJYAkyXAZAkwWQJMlgCTJcBkCTBZAkyWAJMlYLLLGs853igz2WSX9Tzn+HCVIf4V5gBv+Pt1o/dAZ5nJtF+1js0ocB0nqQbcAXZi/31jGIZhGCX5DTQy/pTFeqp6AAAAAElFTkSuQmCC');
			}
			#container .unorderedlist{
			    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAABLCAYAAAA4TnrqAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAuIwAALiMBeKU/dgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAI0SURBVHic7dq7axRBGADw30UloEaICAbBQoVgwEcvKWx8gEh6sUqhf4jYaauFVtFGwUK00MrOR2ER8ZFCFBUj+ERFET2NxSgiZHbv9kJul3w/+JrZb4eZ79i527khhBBCCCGEEEIIIYQQlrpWBzkbMIIZfO0gfznGsL6HcS22H3iAt1U7aOEUfmIOH3Co5J5xzP7Jb2KcxbIu6wQOz9PZN2zJ5A/ieQ0m3GsczRVkoKBYE5mC7M/kj2FjQX9NsS93oahYnzPtnzLtnaxnTfClyk27/Fuv/sYrDGfyW7ipP4/OQsaeKsUiPYrT+Igb2FmSP4JL0qfT70l3E7/wWFqnQwghhBBCqK+y/awhHMEo7mAK7ZJ7DmA31vQ6uEU0J/2Cn8LrKh2sxVP/vxZcUVzgYxb/VWUhY1ba7Oza8UyHuRfNdfhegwn3GidyBSnaotmRad+ead+MFQX9NcXW3IWiYk1n2u9l2p9Ie9lNN1PlpvnWrMuW8JrVybfhpPSI3cYFae+nyEFpa7Zpj+RLnMabfg8khBBCCCGEyiZwF+9xDdtK8kdwEe/0/9Wlm2jjvh7+ka5y1uFWDSbea+ytUqzzmc4mM/mjNZjoQsS5XEGKtmiGMu2rM+0rC/pqklW5C0XFujpPWxvXM/mP8KKLQdVVbn6FBnBSKtCcdKa0bAEcl7Y6+v0oVY0zCs6UdnJaeRib8FA6U1pmUDrH1aR/d9rSRuezfg8khBBCCCGEEEIIIYQQ6u03kq1rwGv96WIAAAAASUVORK5CYII=');
			}
			#container .orderedlist{
			    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEsAAABLCAYAAAA4TnrqAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAuIwAALiMBeKU/dgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJDSURBVHic7dq9TxRBGMfx7x2KQfSQzhCICRgSk9OKBgobwY6KhARLC/4CaioKqAQLGwtfao0k0BITNbGSoFEIEBrsjAQTCETepJi7gMfOvrl7Oye/TzLNZGb3mefYJfPsgIiIiIiIiIiIiMh5lws57gJQBLaAtZBzmoHbQH2MuLLyE/gG7Me9QBFYBf6U2nvgus/4HPAYODo1p5baD6A3Rp7IAV89LvjaZ84DBxacRMKuRE3WTcvFdjGPppfnDiw2iXa3cmH5gGTtlCZWOsA8ZrY5/4NY65jmbNYf+YzvpnbfV+X2GaiLniooAE+BX5hneRz7I1g2ACwDhw4sPErbBWaAtqhJEhERERGpirD1rKiuAQ+BdmAeeInZT/q5B9wvzc3KNvABeFOtGzYDK/y9jZjDf681QjbbG1ub/McchDZqCWDQMr6Bk+qGK+0QuFEZaFCJJo6ipf+Opb8NkzCX5IFOr86kLVr6lyz93zG7fZccYaomqWvCJOb0n/U7/D9c1MQ7K63/hgVgGFOW/gS8APYC5vQB/cCllGIK4wB4C7zKMAYREREREfcVgGfAJrAOjBF8rmsAWMDsDJLa5mxijis4/UV6hrOBT/iM7yHd8xRfCD6ikIkWvAPewL53fWKZk2TrqrxpGiWaqBot/Vex/7qXU4ql2veIzHa6cNZnzpDH+CRbrJN/1XILU2wrB/uR4HOrU6Tz3rKeKU2rnhVHHlOS/s3JB48grUAHcDGhGLYxB9lcq9yKiIiIiIiIiIiIOOIYaxc11Cpvh4UAAAAASUVORK5CYII=');
			}
			#container .strikethrough{
			    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAQAAACROWYpAAAAAmJLR0QA/4ePzL8AAABFSURBVEjHY2AY2eAww38i4GHsmv8TCXFqxmYYPjVIzj5MUPNhXM7G5Q2ywKhm2mo+TG7ipFjzYAGjiYTs8uwwHTUPZwAAW5aYHd3noZcAAAAASUVORK5CYII=');
			}
			#container .color-apply{
			    width: 20px;
			    height: 20px;
			}
			#container #input-font{
		
			    width: 100px;
			    height: 20px;
			    vertical-align: middle;
			    position: relative;
			    margin: 0px 10px;

			}
			[contentEditable=true]:empty:not(:focus):before{
			    content:attr(data-text);
			    color:#888;
			}
			#container .loader {
			    border: 6px solid #f3f3f3; 
			    border-top: 6px solid #3498db; 
			    border-radius: 50%;
			    width: 20px;
			    height: 20px;
			    animation: spin 2s linear infinite;
			    margin: 0 auto;
			    line-height: 20px;
			}

			/* @keyframes spin {
			0% { transform: rotate(0deg); }
			100% { transform: rotate(360deg); }
			} */
			.fontStyle{
				vertical-align: bottom;

			}
			.input{
				position: relative;
			    height: 20px;
			    width: 35px;
	
			}
	</style>
</head>
<body>
	
	    <fieldset>
	      <a  href="javascript:void(0);" class="fontStyle italic" onclick="document.execCommand('italic',false,null);" title="Italicize Highlighted Text"></a>
	      <a href="javascript:void(0);"  class="fontStyle bold" onclick="document.execCommand( 'bold',false,null);" title="Bold Highlighted Text"></a>
	      <a href="javascript:void(0);"  class="fontStyle underline" onclick="document.execCommand( 'underline',false,null);"></a>
	      <select id="input-font" class="fontStyle"  onchange="changeFont (this);">
	        <option value="Arial">Arial</option>
	        <option value="Helvetica">Helvetica</option>
	        <option value="Times New Roman">Times New Roman</option>
	        <option value="Sans serif">Sans serif</option>
	        <option value="Courier New">Courier New</option>
	        <option value="Verdana">Verdana</option>
	        <option value="Georgia">Georgia</option>
	        <option value="Palatino">Palatino</option>
	        <option value="Garamond">Garamond</option>
	        <option value="Comic Sans MS">Comic Sans MS</option>
	        <option value="Arial Black">Arial Black</option>
	        <option value="Tahoma">Tahoma</option>
	        <option value="Comic Sans MS">Comic Sans MS</option>
	      </select>
	      <!-- font size start -->
	      <select id="fontSize" class="input" onclick="changeSize();">
	        <option value="1">1</option>      
	        <option value="2">2</option>
	        <option value="3">3</option>
	        <option value="4">4</option>
	        <option value="5">5</option>
	        <option value="6">6</option>
	        <option value="7">7</option>
	        <option value="8">8</option>
	      </select>
	      <!-- font size end -->
	      <a href="javascript:void(0);"  class="fontStyle strikethrough" onclick="document.execCommand( 'strikethrough',false,null);"><strikethrough></strikethrough></a>
	      <a href="javascript:void(0);"  class="fontStyle align-left" onclick="document.execCommand( 'justifyLeft',false,null);"><justifyLeft></justifyLeft></a>
	      <a href="javascript:void(0);"class="fontStyle align-center" onclick="document.execCommand( 'justifyCenter',false,null);"><justifyCenter></justifyCenter></a>
	      <a href="javascript:void(0);"  class="fontStyle align-right" onclick="document.execCommand( 'justifyRight',false,null);"><justifyRight></justifyRight></a>
	      <a href="javascript:void(0);"  class="fontStyle redo-apply" onclick="document.execCommand( 'redo',false,null);"><redo></redo></a>
	      <a href="javascript:void(0);"  class="fontStyle undo-apply" onclick="document.execCommand( 'undo',false,null);"><undo></undo></a>
	      <a href="javascript:void(0);"  class="fontStyle orderedlist" onclick="document.execCommand('insertOrderedList', false, null);"><insertOrderedList></insertOrderedList></a>
	      <a href="javascript:void(0);"  class="fontStyle unorderedlist" onclick="document.execCommand('insertUnorderedList',false, null);"><insertUnorderedList></insertUnorderedList></a>    
	      <input class="color-apply" type="color" onchange="chooseColor();" id="myColor">
	  	</fieldset>
	  	<!-- <div id="#" class="editor1" style="resize:both; overflow:auto;max-width:100%;min-width: 100%;" class="titletou" contenteditable="true" data-text="Enter comment...."></div>
 -->	  	
	

<script type="text/javascript">
	function chooseItalic(){
	  // var myitalic= document.execCommand('italic',false,null);
      // var myitalic = document.getElementById("Italicize").innerHTML;
      // document.execCommand('italic', false, null);
    }

	function chooseColor(){
      var mycolor = document.getElementById("myColor").value;
      document.execCommand('foreColor', false, mycolor);
    }

    function changeFont(){
      var myFont = document.getElementById("input-font").value;
      document.execCommand('fontName', false, myFont);
    }

    function changeSize(){
      var mysize = document.getElementById("fontSize").value;
      document.execCommand('fontSize', false, mysize);
    }

    function checkDiv(){
      var editorText = document.getElementByClass("editor1").innerHTML;
      if(editorText === ''){
        document.getElementByClass("editor1").style.border = '5px solid red';
      }
    }

    function removeBorder(){
      document.getElementByClass("editor1").style.border = '1px solid transparent';
    }   
</script>
</body>
</html>