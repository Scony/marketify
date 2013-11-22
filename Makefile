todo:
	ack-grep todo

clean:
	find . -name '*~' | xargs rm -f
	find . -name '*.orig' | xargs rm -f